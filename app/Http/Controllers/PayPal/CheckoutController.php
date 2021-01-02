<?php

namespace App\Http\Controllers\PayPal;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Http\Controllers\Controller;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PayPal\Exception\PayPalConnectionException;

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
        $apiContext = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $apiContext->setConfig(config('paypal.settings'));

        if (!in_array($amount, [3, 5, 7, 11, 12, 15, 20, 25])) {
            return Redirect::route('store')->with(['error' => 'You cannot topup this amount.']);
        }

        $payer = (new Payer)
            ->setPaymentMethod('paypal');

        $item = (new Item)
            ->setName('Topup Balance')
            ->setCurrency('GBP')
            ->setPrice($amount)
            ->setQuantity(1);

        $itemList = (new ItemList)
            ->setItems([$item]);

        $amount = (new Amount)
            ->setCurrency('GBP')
            ->setTotal($amount);

        $redirectUrls = (new RedirectUrls)
            ->setReturnUrl(route('paypal.verify'))
            ->setCancelUrl(route('store'));

        $transaction = (new Transaction)
            ->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription(sprintf('%s account balance topup', config('habbo.site.shortname')));

        $payment = (new Payment)
            ->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            $payment->create($apiContext);
        } catch (PayPalConnectionException $e) {
            echo $e->getCode();
            echo $e->getData();
            die($e);
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Unknown error occurred');
        return Redirect::route('store');
    }
}
