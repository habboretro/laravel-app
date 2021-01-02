<?php

namespace App\Http\Controllers\PayPal;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;

class NotifyController extends Controller
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
        $request->merge(['cmd' => '_notify-validate']);
        $response = (string) $provider->verifyIPN($request->all());
        info($request->all());

        if ($response === 'VERIFIED') {
            info(Invoice::find($request->get('invoice'))->toArray());
            if (!$invoice = Invoice::find($request->get('invoice'))) return;
            info(Invoice::find($request->get('invoice'))->toArray());
            if ($invoice->claimed) return;
            info('found');
            $invoice->update(['claimed' => true]);
            info('claimed');
            $invoice->user()->update(['balance' => $invoice->user->balance + $invoice->price]);
            info('balance');
        }
    }
}
