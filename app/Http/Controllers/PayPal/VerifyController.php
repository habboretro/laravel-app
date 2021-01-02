<?php

namespace App\Http\Controllers\PayPal;

use PayPal\Api\Payment;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\PaymentExecution;
use App\Http\Controllers\Controller;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PayPal\Exception\PayPalConnectionException;

class VerifyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $apiContext = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $apiContext->setConfig(config('paypal.settings'));

        $paymentId = Session::get('paypal_payment_id');
        Session::forget('paypal_payment_id');
        if (empty($request->PayerID) || empty($request->token)) {
            session()->flash('error', 'Payment failed');
            return Redirect::route('store');
        }
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        try {
            $result = $payment->execute($execution, $apiContext);
        } catch (PayPalConnectionException $e) {
            echo $e->getCode();
            echo $e->getData();
            die($e);
        }

        if ($result->getState() == 'approved') {
            $amount = (int) $result->getTransactions()[0]->amount->total;
            $request->user()->update(['balance' => $request->user()->balance + $amount]);
            return Redirect::route('store')->with(['success' => 'Your account balance has been updated.']);
        }

        session()->flash('error', 'Payment failed');
        return Redirect::route('store')->with(['error' => 'Unable to update account balance.']);
    }
}
