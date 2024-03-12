<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseDetail;
use App\Models\PurchaseRenew;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class SubscriptionRenew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'renew all subscription';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("Check Renew");
        $subscriptionRenewData = PurchaseDetail::where('end_time', '<', now()->setTimezone("Asia/Dhaka")->timestamp)->where('unsubscribed', 0)->get();
        foreach($subscriptionRenewData as $subscriptionRenew)
        {
            // referenceCode used as transactionID
            $token = Str::random(32);
            // Subscription renew increment
            $subscriptionRenew->renew += 1;
            //  Check package and prepare data according that
            if($subscriptionRenew->subscription_plan == 'Daily'){
                $subscriptionEndTime = now()->setTimezone("Asia/Dhaka")->addDay()->timestamp;
                $subscriptionRenew->end_time = $subscriptionEndTime;
                // For Message
                $period = "দৈনিক";
                $taka = "3";
                // For charging API
                $subscPeriod = "P1D";
                $desc = "XossGamesDailyRenew";
            }elseif($subscriptionRenew->subscription_plan == 'Weekly'){
                $subscriptionEndTime = now()->setTimezone("Asia/Dhaka")->addDays(7)->timestamp;
                $subscriptionRenew->end_time = $subscriptionEndTime;
                // For Message
                $period = "সাপ্তাহিক";
                $taka = "9.99";
                // For charging API
                $subscPeriod = "P1W";
                $desc = "XossGamesWeeklyRenew";
            }elseif($subscriptionRenew->subscription_plan == 'Monthly'){
                $subscriptionEndTime = now()->setTimezone("Asia/Dhaka")->addDays(30)->timestamp;
                $subscriptionRenew->end_time = $subscriptionEndTime;
                // For Message
                $period = "মাসিক";
                $taka = "39.99";
                // For charging API
                $subscPeriod = "P1M";
                $desc = "XossGamesMonthlyRenew";
            }
            $acrExpirationTime = $subscriptionRenew->end_time + 2592000;
            if($acrExpirationTime > now()->setTimezone("Asia/Dhaka")->timestamp){
                info('checked expiration done');
                // Charge user by chargin API
                $data = [
                    "amountTransaction" => [
                        "endUserId" => $subscriptionRenew->customer_reference,
                        "transactionOperationStatus" => "Charged",
                        "referenceCode" => substr($token, 0, 15),
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
                                    "consentId" => $subscriptionRenew->consent_id,
                                    "subscriptionPeriod" => $subscPeriod,
                                    "subscription" => $subscriptionRenew->customer_reference,
                                ],
                            ]
                        ],
                    ]
                ];
                $jsonData = json_encode($data);
                $url = "https://api.dob.telenordigital.com/partner/payment/v1/$subscriptionRenew->customer_reference/transactions/amount";
                // $url = "https://api.dob-staging.telenordigital.com/partner/payment/v1/$subscriptionRenew->customer_reference/transactions/amount";
                // Send Request to the API 
                $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
                info($response);
                info($subscriptionRenew->customer_reference);
                if($response->successful()){
                    info('chrage request sent');
                    $subscriptionRenew->update();
                    $recieve = json_decode($response->body(), true);
                    // if($recieve['amountTransaction']['transactionOperationStatus'] == 'charged'){
                        $renewInfo = new PurchaseRenew();
                        $renewInfo->subscriber_id = $subscriptionRenew->subscriber_id;
                        $renewInfo->amount = $subscriptionRenew->amount;
                        $renewInfo->subscription_plan = $subscriptionRenew->subscription_plan;
                        $renewInfo->subscription_day = $subscriptionRenew->subscription_day;
                        $renewInfo->customer_reference = $subscriptionRenew->customer_reference;
                        $renewInfo->consent_id = $subscriptionRenew->consent_id;
                        $renewInfo->token = $token;
                        $renewInfo->start_time = now()->setTimezone("Asia/Dhaka")->timestamp;
                        $renewInfo->end_time = $subscriptionEndTime;
                        if($renewInfo->save()){
                            info('renew on save database');
                            // $data = [
                            //     "outboundSMSMessageRequest" => [
                            //         "address" => "acr:" . $subscriptionRenew->customer_reference,
                            //         "senderAddress" => "tel:+88022900",
                            //         "outboundSMSTextMessage" => [
                            //             "message" => "XossGames পরিষেবার {$period} সাবস্ক্রিপশনের জন্য {$taka} + 16% TAX (VAT,SC) টাকা কাটা হয়েছে। বাতিল করার জন্য এখানে প্রবেশ করুন - https://xoss.games"
                            //         ],
                            //         "senderName" => "22900",
                            //         "messageType" => "ARN"
                            //     ]
                            // ];
                            // $jsonData = json_encode($data);
                            // $url = "https://api.dob.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
            
                            // Send Request to the API 
                            // $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            
                            // if($response->successful()){
                            //     info($subscriptionRenew->customer_reference . " renewed successful.");
                            // }
                        }
                    // }
                }
                else{
                    info("renew not success");
                }
            }
        }
        


        //// For future work

        // $recieve = json_decode($response->body(), true);
        // dd($recieve['amountTransaction']['transactionOperationStatus']);

    }
}
