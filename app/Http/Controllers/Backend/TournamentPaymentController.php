<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TournamentGame;
use App\Models\Frontend\TournamentPaymentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class TournamentPaymentController extends Controller
{
    //---tournamant_payment
    public function tournamant_payment($slug)
    {
        $game = TournamentGame::where('slug', $slug)->first();
        // Prepare data to send  Consent API request
        $data = [
            "amount" => $game->game_fee,
            "currency" => "BDT",
            "productDescription" => "XossGames",
            // "subscriptionPeriod" => $game->subscription_period,
            "stopMessage" => "STOP SUBSCRIPTION",
            "urls" => [
                "ok" => "https://xoss.games/tournament/success/$game->id",
                "deny" => "https://xoss.games/tournament/deny/$game->slug",
                "error" => "https://xoss.games/tournament/error/$game->slug"
            ],
            "operatorId" => "GRA-BD",
            "referenceId" => "pk-xyz-eng_eb4b7-8782-1b469ed27852"
        ];
        $jsonData = json_encode($data);
        // $url = "https://api.dob.telenordigital.com/partner/v3/consent/prepare";
        $url = "https://api.dob-staging.telenordigital.com/partner/v3/consent/prepare";

        // Send Request to the API 
        $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

        // Receive data and redirect for subscription process
        $subscriptionData = json_decode($response->body(), true);
        return redirect($subscriptionData['url']);
    }

    //----tournamant_payment_success
    public function tournamant_payment_success(Request $request, $id)
    {
        $game = TournamentGame::where('id', $id)->first();
        $paymentDetails = new TournamentPaymentDetails();
        $paymentDetails->subscriber_id = Auth::guard('subscriber')->user()->id;
        $paymentDetails->tournament_game_id = $game->id;
        $paymentDetails->token = Str::random(32);
        $paymentDetails->amount = $game->game_fee;
        $paymentDetails->subscription_day = "3";
        $paymentDetails->customer_reference = $request->input('customerReference');
        $paymentDetails->consent_id = $request->input('consentId');
        $desc = "XossGamesTournament";
          // Charge user by chargin API
          $data = [
            "amountTransaction" => [
                "endUserId" => $paymentDetails->customer_reference,
                "transactionOperationStatus" => "Charged",
                "referenceCode" => substr($paymentDetails->token, 0, 15),
                "paymentAmount" => [
                    "chargingInformation" => [
                        "amount" => $game->game_fee,
                        "currency" => "BDT",
                        "description" => $desc
                    ],
                    "chargingMetaData" => [
                        "onBehalfOf" => "Naptechlabs",
                        "channel" => "WEB",
                        "mandateId" => [
                            "renew" => "false",
                            "consentId" => $paymentDetails->consent_id,
                            // "subscriptionPeriod" => $game->subscription_period,
                            "subscription" => $paymentDetails->customer_reference,
                        ],
                    ]
                ],
            ]
        ];
        $jsonData = json_encode($data);
        // $url = "https://api.dob.telenordigital.com/partner/payment/v1/$paymentDetails->customer_reference/transactions/amount";
        $url = "https://api.dob-staging.telenordigital.com/partner/payment/v1/$paymentDetails->customer_reference/transactions/amount";
  
        $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        

        info($response->body());
        if ($response->successful()) {

            if ($paymentDetails->save()) {
                $data = [
                    "outboundSMSMessageRequest" => [
                        "address" => "acr:" . $request->input('customerReference'),
                        "senderAddress" => "tel:+88022900",
                        "outboundSMSTextMessage" => [
                            "message" => "XossGames টুর্নামেন্ট-এ অংশগ্রহণের জন্য অভিনন্দন । আপনার কাছ থেকে {$game->game_fee} + 16% TAX (VAT,SC) টাকা কর্তন করা হয়েছে"
                        ],
                        "senderName" => "22900",
                        "messageType" => "ARN"
                    ]
                ];
                $jsonData = json_encode($data);
                // $url = "https://api.dob.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
                $url = "https://api.dob-staging.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";


                // Send Request to the API 
                $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                
                return redirect()->route('tournament.game.details', $game->slug)->with('success', 'Payment Successfull! Enjoy Tournament Game!');
            } else {
                return redirect()->route('tournament.game.details', $game->slug)->with('error', 'Payment Failed! Please try again.');
            }
        }else{
            return redirect()->route('tournament.game.details', $game->slug)->with('error', 'Payment Not Sucess! Please try again.');
        }
    }

     public function tournamant_payment_deny($slug)
    {
        return redirect()->route('tournament.game.details', $slug)->with('error', 'Payment  Deny! Please try again.');
    }

    public function tournamant_payment_error($slug)
    {
        return redirect()->route('tournament.game.details', $slug)->with('error', 'Payment Error! Please try again.');
    }
}
