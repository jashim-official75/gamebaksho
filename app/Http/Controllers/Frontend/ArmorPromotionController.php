<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Models\GamePlay;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use App\Models\SubscriberDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

class ArmorPromotionController extends Controller
{
    //--armor_daily
    public function armor_daily(Request $request)
    {
        $click_id = $request->sid;
        $plan = 'daily';
        //---daily package
        if ($plan == "daily") {
            // Prepare data to send API request
            $data = [
                "amount" => 3,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1D",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/armor/process-subscription?plan=daily&click_id=$click_id",
                    "deny" => "https://xoss.games/armor/deny",
                    "error" => "https://xoss.games/armor/error"
                    // "ok" => "http://127.0.0.1:8000/armor/process-subscription?plan=daily&click_id=$click_id",
                    // "deny" => "http://127.0.0.1:8000/armor/deny",
                    // "error" => "http://127.0.0.1:8000/armor/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "naptechlabs-2515-xossgames"
            ];
            $jsonData = json_encode($data);
            $url = "https://api.dob.telenordigital.com/partner/v3/consent/prepare";
            // $url = "https://api.dob-staging.telenordigital.com/partner/v3/consent/prepare";

            // Send Request to the API 
            $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

            // Receive data and redirect for subscription process
            $subscriptionData = json_decode($response->body(), true);
            return redirect($subscriptionData['url']);
        }
    }
    //---armor_weekly
    public function armor_weekly(Request $request)
    {
        $click_id = $request->sid;
        $plan = 'weekly';
        //---weekly package
        if ($plan == "weekly") {
            // Prepare data to send API request
            $data = [
                "amount" => 9.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1W",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/armor/process-subscription?plan=weekly&click_id=$click_id",
                    "deny" => "https://xoss.games/armor/deny",
                    "error" => "https://xoss.games/armor/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "naptechlabs-2515-xossgames"
            ];
            $jsonData = json_encode($data);
            $url = "https://api.dob.telenordigital.com/partner/v3/consent/prepare";

            // Send Request to the API 
            $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

            // Receive data and redirect for subscription process
            $subscriptionData = json_decode($response->body(), true);
            return redirect($subscriptionData['url']);
        }
    }
    //---armor_monthly
    public function armor_monthly(Request $request)
    {
        $click_id = $request->sid;
        $plan = 'monthly';
        //---monthly package
        if ($plan == "monthly") {
            // Prepare data to send API request
            $data = [
                "amount" => 39.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1M",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/armor/process-subscription?plan=monthly&click_id=$click_id",
                    "deny" => "https://xoss.games/armor/deny",
                    "error" => "https://xoss.games/armor/error"
                    // "ok" => "http://127.0.0.1:8000/armor/process-subscription?plan=monthly&click_id=$click_id",
                    // "deny" => "http://127.0.0.1:8000/armor/deny",
                    // "error" => "http://127.0.0.1:8000/armor/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "naptechlabs-2515-xossgames"
            ];
            $jsonData = json_encode($data);
            $url = "https://api.dob.telenordigital.com/partner/v3/consent/prepare";
            // $url = "https://api.dob-staging.telenordigital.com/partner/v3/consent/prepare";

            // Send Request to the API 
            $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

            // Receive data and redirect for subscription process
            $subscriptionData = json_decode($response->body(), true);
            return redirect($subscriptionData['url']);
        }
    }

    //---armorProcessSubscription
    public function armorProcessSubscription(Request $request)
    {
        // return $request->all();
        $purchaseDetails = new PurchaseDetail();
        $purchaseDetails->start_time = now()->setTimezone("Asia/Dhaka")->timestamp;
        // Data depend on plan
        if ($request->plan == 'daily') {
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
        }

        // Data depend on plan weekly
        elseif ($request->plan == 'weekly') {
            $purchaseDetails->subscription_plan = "Weekly";
            $packagesPlan = "weekly";
            $purchaseDetails->amount = 9.99;
            $purchaseDetails->subscription_day = 7;
            $purchaseDetails->end_time = now()->setTimezone("Asia/Dhaka")->addDay(7)->timestamp;
            // For Message
            $period = "সাপ্তাহিক";
            $taka = "9.99";
            // For charging API
            $subscPeriod = "P1W";
            $desc = "XossGamesWeekly";
        }

        // Data depend on plan monthly
        elseif ($request->plan == 'monthly') {
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
                auth()->guard('subscriber')->login($check_acr);
                return redirect('/')->with('success', 'You are Already Subscribed and Your Account Login successfully.');
            }
        }

        $url = "https://api.dob.telenordigital.com/partner/payment/v1/$purchaseDetails->customer_reference/transactions/amount";
        // $url = "https://api.dob-staging.telenordigital.com/partner/payment/v1/$purchaseDetails->customer_reference/transactions/amount";
        // Send Request to the API 
        $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

        //---log store response
        info($response->body());

        if ($response->successful()) {
            //---first check acr 
            if ($check_acr) {
                $subscriber_details = PurchaseDetail::where('subscriber_id', $check_acr->id)->latest()->first();
                //---check current time and subscriber end time 
                if ($current_timestamp > $subscriber_details->end_time) {
                    $purchaseDetails->subscriber_id = $check_acr->id;
                    $purchaseDetails->armor_id = $request->click_id;
                    //----success message
                    if ($purchaseDetails->save()) {
                        //--old purchase details unsubscribe ---
                        $subscriber_details->update([
                            'unsubscribed' => 1
                        ]);

                        //--login this user 
                        Auth::guard('subscriber')->login($check_acr);

                        //---feedback url-----
                        // $feedback_url = Http::get("https://xoss.games/armor/feedback?taka=$taka&click_id=$request->click_id");
                        $feedback_url = Http::get("http://armorads.aftrad-event.com/api/v1/events?advertiser_id=164&click_id=$request->click_id");
                        if ($feedback_url->successful()) {
                            info('feedback message send successfully');
                        }


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
                        // $url = "https://api.dob-staging.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";

                        // Send Request to the API 
                        // $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                        $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

                        return redirect('/')->with('success', 'Subscription Successfull! Enjoy our games!');
                    } else {
                        return redirect('/')->with('error', 'Subscription Failed! Please try again.');
                    }
                } else {
                    Auth::guard('subscriber')->login($check_acr);
                    return redirect('/')->with('success', 'You are Already Subscribed and Your Account Login successfully Done.');
                }
            } else {
                //----new user registration -----
                $newUser = Subscriber::create([
                    'acr' => $customerReference_to_acr,
                    'armor_id' => $request->click_id,
                    'device_ip' => $request->ip(),
                ]);

                //---subscriber device details-----
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
                $purchaseDetails->armor_id = $request->click_id;

                //---success message
                if ($purchaseDetails->save()) {
                    //---login 
                    Auth::guard('subscriber')->login($newUser);
                    //---feedback url-----
                    // $feedback_url = Http::get("https://xoss.games/armor/feedback?taka=$taka&click_id=$request->click_id");
                    $feedback_url = Http::get("http://armorads.aftrad-event.com/api/v1/events?advertiser_id=164&click_id=$request->click_id");
                    if ($feedback_url->successful()) {
                        info('feedback message send successfully');
                    }
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
                    // $url = "https://api.dob-staging.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
                    // Send Request to the API 
                    $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                    // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

                    return redirect('/')->with('success', 'Subscription Successfully!');
                } else {
                    return redirect('/')->with('error', 'Subscription Failed! Please try again.');
                }
            }
        } else {
            return redirect('/')->with('error', 'Subscription Failed! Please try again.');
        }
    }

    //---feedback
    public function feedback(Request $request)
    {
        Role::create([
            'name' => $request->click_id,
            'slug' => $request->click_id,
        ]);
    }

    //---armorSubscriptionDeny
    public function armorSubscriptionDeny()
    {
        return redirect('/')->with('error', 'Subscription Failed! Please try again.');
    }

    //---armorSubscriptionError
    public function armorSubscriptionError()
    {
        return redirect('/')->with('error', 'Subscription Failed! Please try again.');
    }
}
