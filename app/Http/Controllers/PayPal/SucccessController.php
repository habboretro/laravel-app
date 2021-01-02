<?php

namespace App\Http\Controllers\PayPal;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;

class SucccessController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->get('token'));

        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return Redirect::route('store')->with(['error' => 'Error processing PayPal payment']);
        }

        $invoice = Invoice::find(explode('_', $response['INVNUM'])[1]);

        if (is_null($invoice)) {
            return Redirect::route('store')->with(['error' => 'Could not find proof of this purchase.']);
        }

        $paymentStatus = $provider->doExpressCheckoutPayment([
            'items' => [['name' => sprintf('%s Topup (£%s)', config('habbo.site.shortname'), $invoice->price), 'price' => $invoice->price, 'qty' => 1]],
            'return_url' => route('paypal.success'),
            'invoice_id' => $invoice->id,
            'invoice_description' => $invoice->title,
            'cancel_url' => route('me'),
            'total' => $invoice->price,
        ], $request->get('token'), $request->get('PayerID'))['PAYMENTINFO_0_PAYMENTSTATUS'] ?? null;

        if (is_null($paymentStatus)) {
            return Redirect::route('store')->with(['error' => 'There was a problem processing your order.']);
        }

        $invoice->update(['status' => $paymentStatus]);

        return Redirect::route('store')->with(($invoice->paid) ? ['error' => 'Error processing PayPal payment'] : ['success' => 'Your order was successful']);
    }
}
