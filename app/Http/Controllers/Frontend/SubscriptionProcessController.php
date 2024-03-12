<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use App\Models\SubscriberDetail;

class SubscriptionProcessController extends Controller
{
    public function processSubscription(Request $request, $plan)
    {
        $purchaseDetails = new PurchaseDetail();
        $purchaseDetails->start_time = now()->setTimezone("Asia/Dhaka")->timestamp;
        // Data depend on plan
        if ($plan == 'daily') {
            $purchaseDetails->subscription_plan = "Daily";
            $packagesPlan = "daily";
            $purchaseDetails->amount = 3;
            $purchaseDetails->subscription_day = 1;
            $purchaseDetails->end_time = now()->setTimezone("Asia/Dhaka")->addDay()->timestamp;
            // For Message
            $period = "দৈনিক";
            $taka = "3";
            // For charging API
            $subscPeriod = "P1D";
            $desc = "XossGamesDaily";
        } elseif ($plan == 'weekly') {
            $purchaseDetails->subscription_plan = "Weekly";
            $packagesPlan = "weekly";
            $purchaseDetails->amount = 9.99;
            $purchaseDetails->subscription_day = 7;
            $purchaseDetails->end_time = now()->setTimezone("Asia/Dhaka")->addDays(7)->timestamp;
            // For Message
            $period = "সাপ্তাহিক";
            $taka = "9.99";
            // For charging API
            $subscPeriod = "P1W";
            $desc = "XossGamesWeekly";
        } else {
            $purchaseDetails->subscription_plan = "Monthly";
            $packagesPlan = "monthly";
            $purchaseDetails->amount = 39.99;
            $purchaseDetails->subscription_day = 30;
            $purchaseDetails->end_time = now()->setTimezone("Asia/Dhaka")->addDays(30)->timestamp;
            // For Message
            $period = "মাসিক";
            $taka = "39.99";
            // For charging API
            $subscPeriod = "P1M";
            $desc = "XossGamesMonthly";
        }
        $purchaseDetails->token = Str::random(32);
        $purchaseDetails->customer_reference = $request->input('customerReference');
        $purchaseDetails->consent_id = $request->input('consentId');

        // Charge user by chargin API
        $data = [
            "amountTransaction" => [
                "endUserId" => $purchaseDetails->customer_reference,
                "transactionOperationStatus" => "Charged",
                "referenceCode" => substr($purchaseDetails->token, 0, 15),
                "paymentAmount" => [
                    "chargingInformation" => [
                        "amount" => $taka,
                        "currency" => "BDT",
                        "description" => $desc
                    ],
                    "chargingMetaData" => [
                        "onBehalfOf" => "Naptechlabs",
                        "channel" => "WEB",
                        "mandateId" => [
                            "renew" => "true",
                            "consentId" => $purchaseDetails->consent_id,
                            "subscriptionPeriod" => $subscPeriod,
                            "subscription" => $purchaseDetails->customer_reference,
                        ],
                    ]
                ],
            ]
        ];
        $jsonData = json_encode($data);

        //--get acr----
        $customerReference = $purchaseDetails->customer_reference;
        $customerReference_to_acr = substr($customerReference, 0, 15);
        $check_acr = Subscriber::where('acr', $customerReference_to_acr)->first();
        $current_timestamp = now()->setTimezone("Asia/Dhaka")->timestamp;

        //---first check acr 
        if ($check_acr) {
            $subscriber_details = PurchaseDetail::where('subscriber_id', $check_acr->id)->latest()->first();
            if ($current_timestamp < $subscriber_details->end_time) {
                Auth::guard('subscriber')->login($check_acr);
                return redirect('/')->with('success', 'You are Already Subscribed and Your Account Login successfully.');
            }
        } 

        $url = "https://api.dob.telenordigital.com/partner/payment/v1/$purchaseDetails->customer_reference/transactions/amount";
        // $url = "https://api.dob-staging.telenordigital.com/partner/payment/v1/$purchaseDetails->customer_reference/transactions/amount";
        // Send Request to the API 
        $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        info($response->body());
        if ($response->successful()) {
            //---first check acr 
            if ($check_acr) {
                $subscriber_details = PurchaseDetail::where('subscriber_id', $check_acr->id)->latest()->first();
                //---check current time and subscriber end time 
                if ($current_timestamp > $subscriber_details->end_time) {
                    $purchaseDetails->subscriber_id = $check_acr->id;
                     //--old purchase details unsubscribe ---
                        $subscriber_details->update([
                            'unsubscribed' => 1
                        ]);
                    //--login this user 
                    // Auth::guard('subscriber')->login($check_acr);
                    //----success message
                    if ($purchaseDetails->save()) {
                        //--login this user 
                        Auth::guard('subscriber')->login($check_acr);
                        $data = [
                            "outboundSMSMessageRequest" => [
                                "address" => "acr:" . $request->input('customerReference'),
                                "senderAddress" => "tel:+88022900",
                                "outboundSMSTextMessage" => [
                                    "message" => "XossGames পরিষেবাটি চালু হয়েছে। আপনার কাছ থেকে {$taka} + 16% TAX (VAT,SC) টাকা/{$period} হারে কর্তন করা হবে। পরিষেবাটি বন্ধ করতে https://xoss.games এ প্রবেশ করুন।"
                                ],
                                "senderName" => "22900",
                                "messageType" => "ARN"
                            ]
                        ];
                        $jsonData = json_encode($data);
                        $url = "https://api.dob.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";

                        // Send Request to the API 
                        $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                        // $url = "https://api.dob-staging.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
                        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                        return redirect('/')->with('subs_success', $packagesPlan.'PackageSubSuccess');
                        // return redirect('/')->with('subs_success', 'Subscription Successfully!');
                    } else {
                        return redirect('/')->with('error', 'Subscription Failed! Please try again already subs.');
                    }
                } else {
                    Auth::guard('subscriber')->login($check_acr);
                    return redirect('/')->with('success', 'You are Already Subscribed and Your Account Login successfully Done.');
                }
            } else {
                //----new user registration -----
                $newUser = Subscriber::create([
                    'acr' => $customerReference_to_acr,
                    'device_ip' => $request->ip(),
                ]);
                //---subscriber details-----
                $agent = new Agent();
                $subscriber_details = SubscriberDetail::create([
                    'subscriber_id' => $newUser->id,
                    'device' => $agent->device(),
                    'ip' => $request->ip(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ]);
                //--purchase details
                $purchaseDetails->subscriber_id = $newUser->id;
                //---login 
                Auth::guard('subscriber')->login($newUser);
                //---success message
                if ($purchaseDetails->save()) {
                    $data = [
                        "outboundSMSMessageRequest" => [
                            "address" => "acr:" . $request->input('customerReference'),
                            "senderAddress" => "tel:+88022900",
                            "outboundSMSTextMessage" => [
                                "message" => "XossGames পরিষেবাটি চালু হয়েছে। আপনার কাছ থেকে {$taka} + 16% TAX (VAT,SC) টাকা/{$period} হারে কর্তন করা হবে। পরিষেবাটি বন্ধ করতে https://xoss.games এ প্রবেশ করুন।"
                            ],
                            "senderName" => "22900",
                            "messageType" => "ARN"
                        ]
                    ];
                    $jsonData = json_encode($data);
                    $url = "https://api.dob.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
                    // Send Request to the API 
                    $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                    // $url = "https://api.dob-staging.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
                        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            
                    return redirect('/')->with('subs_success', $packagesPlan.'PackageSubSuccess');
                } else {
                    return redirect('/')->with('error', 'Subscription Failed! Please try again.');
                }
            }
        } else {
            return redirect('/')->with('error', 'Subscription Failed! Please try again.');
        }
    }

    public function subscriptionDeny()
    {
        return redirect('/')->with('error', 'Subscription Failed! Please try again.');
    }

    public function subscriptionError()
    {
        return redirect('/')->with('error', 'Subscription Failed! Please try again.');
    }
}
