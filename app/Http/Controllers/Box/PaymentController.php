<?php

namespace App\Http\Controllers\Box;

use App\Models\Box;
use App\Models\Prize;
use Illuminate\Http\Request;
use App\Services\RconService;
use App\Http\Resources\PrizeResource;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, RconService $rcon, Box $box)
    {
        $prizes = collect([]);

        switch ($box->currency_type) {
            case 'balance':
                if ($request->user()->balance < $box->price) return response()->json(['funds' => 'You have insufficient funds in your account.'], 422);
                $request->user()->update(['balance' => $request->user()->balance - $box->price]);
            break;
            case 'credits':
                if ($request->user()->credits < $box->price) return response()->json(['funds' => 'You have insufficient credits in your account.'], 422);
                $rcon->giveCredits($request->user(), -$box->price);
            break;
            case 'diamonds':
                if ($request->user()->currencies->where('type', '5')->first()->amount < $box->price) return response()->json(['funds' => 'You have insufficient diamonds in your account.'], 422);
                $rcon->giveDiamonds($request->user(), -$box->price);
	    break;
	    case 'tokens':
                if ($request->user()->currencies->where('type', '4')->first()->amount < $box->price) return response()->json(['funds' => 'You have insufficient tokens in your account.'], 422);
                $rcon->givePoints($request->user(), 4, -$box->price);
            break;
        }

        foreach ($box->prizes as $prize) {
            foreach (array_fill(1, $prize->percentage, $prize) as $percentagePrizes) {
                $prizes->push($percentagePrizes);
            }
        }

        $prize = $prizes->shuffle()->random();
        switch ($prize->prize_type) {
            case 'furni':
                $rcon->alertUser($request->user(), sprintf('Well Done! You just won %s, please check your inventory for a gift.', $prize->name));
                foreach (range(1, $prize->quantity) as $index) {
                    $rcon->sendGift($request->user(), $prize->prize, sprintf('Well Done! Here is your %s', $prize->name));
                }
            break;
            case 'credits':
                $rcon->alertUser($request->user(), sprintf('Well Done! You just won %s.', $prize->name));
                $rcon->giveCredits($request->user(), $prize->prize, sprintf('Well Done! Here is your %s', $prize->name));
            break;
            case 'diamonds':
                $rcon->alertUser($request->user(), sprintf('Well Done! You just won %s.', $prize->name));
                $rcon->giveDiamonds($request->user(), $prize->prize, sprintf('Well Done! Here is your %s', $prize->name));
            break;
	    case 'tokens':
	    	$rcon->alertUser($request->user(), sprintf('Well Done! You just won %s.', $prize->name));
	   	$rcon->givePoints($request->user(), 4, $prize->prize);
	     break;
        }

        return response()->json(new PrizeResource($prize));
    }
}
