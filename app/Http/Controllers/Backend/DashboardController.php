<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Models\Backend\Year;
use App\Models\Frontend\DeviceInfo;
use App\Models\Game;
use App\Models\PurchaseDetail;
use App\Models\PurchaseRenew;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_games = Game::count();
        $all_users = Subscriber::count();
        $all_subscriber = PurchaseDetail::count();
        $years = Year::get();

        //--common variable
        $currentDate = date('Y-m-d');
        $previousDate = date('Y-m-d', strtotime('-1 day', strtotime($currentDate)));
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        $currentMonth = date('m');

        //traffic
        $previousTraffic = DeviceInfo::where('date', $previousDate)->count();
        $TodayTraffic = DeviceInfo::where('date', $currentDate)->count();
        $TotalTraffic = DeviceInfo::count();

        //---renew
        $todayRenew = PurchaseRenew::whereDate('created_at', $currentDate)->count();
        $weeklyRenew = PurchaseRenew::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $monthlyRenew = PurchaseRenew::whereMonth('created_at', $currentMonth)->count();
        $totalRenew = PurchaseRenew::count();

        return view('backend.pages.dashboard.dashboard', [
            'total_games' => $total_games,
            'all_users' => $all_users,
            'all_subscriber' => $all_subscriber,
            'previousTraffic' => $previousTraffic,
            'TodayTraffic' => $TodayTraffic,
            'TotalTraffic' => $TotalTraffic,
            'todayRenew' => $todayRenew,
            'weeklyRenew' => $weeklyRenew,
            'monthlyRenew' => $monthlyRenew,
            'totalRenew' => $totalRenew,
            'years' => $years,
        ]);
    }

    //---renew
    public function renew()
    {
        
        info('check renew by controller');
        // info ('check renew method');
        // return "ddd";
        $subscriptionRenewData = PurchaseDetail::where('end_time', '<', now()->setTimezone("Asia/Dhaka")->timestamp)->where('unsubscribed', 0)->get();
        $countrenew = 0;
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
                info('checked expiration done by controller');
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
                info($response . "By controller");
                info($subscriptionRenew->customer_reference);
                if($response->successful()){
                    info('chrage request sent by controller');
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
                            info('renew on save database by controller');
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
            
                            // // Send Request to the API 
                            // $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            
                             $countrenew++;
                        }
                    // }
                }
            }
        }

         echo "Total Renew : ".$countrenew;
    }
}
