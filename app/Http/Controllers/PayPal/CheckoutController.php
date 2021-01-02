<?php

namespace App\Http\Controllers\PayPal;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, string $amount)
    {
        $provider = new ExpressCheckout;
        $invoiceId = Invoice::count() + 1;

        if (!in_array($amount, [3, 5, 7, 11, 12, 15, 20, 25])) {
            return Redirect::route('store')->with(['error' => 'You cannot topup this amount.']);
        }

        $invoice = $request->user()->invoices()->create([
            'title' => sprintf('Order #%s Invoice', $invoiceId),
            'price' => $amount,
        ]);

        $response = $provider->setExpressCheckout([
            'items' => [['name' => sprintf('%s Topup (£%s)', config('habbo.site.shortname'), $amount), 'price' => $invoice->price, 'qty' => 1]],
            'return_url' => route('paypal.success'),
            'invoice_id' => sprintf('%s_%s', config('paypal.invoice_prefix'), $invoiceId),
            'invoice_description' => $invoice->title,
            'cancel_url' => route('store'),
            'total' => $invoice->price,
        ], false);

        if (!$response['paypal_link']) {
            return Redirect::route('store')->with(['error' => 'Something went wrong with your purchase.']);
        }

        return redirect($response['paypal_link']);
    }
}
