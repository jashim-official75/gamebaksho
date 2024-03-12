<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class DifferentPackageController extends Controller
{
    //---daily_package
    public function daily_package()
    {
        $games = Game::latest()->take(42)->get();
        return view('frontend.pages.daily_package', [
            'games' => $games
        ]);
    }

    //---weekly_package
    public function weekly_package()
    {
        $games = Game::latest()->take(42)->get();
        return view('frontend.pages.weekly_package', [
            'games' => $games
        ]);
    }

    //---monthly_package
    public function monthly_package()
    {
        $games = Game::latest()->take(42)->get();
        return view('frontend.pages.monthly_package', [
            'games' => $games
        ]);
    }

    //---package_prepare
    public function package_prepare($plan)
    {
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
                    "ok" => "https://xoss.games/process-subscription/daily",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/daily",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
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

        //----weekly package
        if ($plan == 'weekly') {
            // Prepare data to send API request
            $data = [
                "amount" => 9.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1W",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/process-subscription/weekly",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/weekly",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "pk-xyz-eng_eb4b7-8782-1b469ed27852"
            ];
            $jsonData = json_encode($data);
            $url = "https://api.dob.telenordigital.com/partner/v3/consent/prepare";

            // Send Request to the API 
            $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

            // Receive data and redirect for subscription process
            $subscriptionData = json_decode($response->body(), true);
            return redirect($subscriptionData['url']);
        }

        //--monthly package
        if ($plan == 'monthly') {
            // Prepare data to send API request
            $data = [
                "amount" => 39.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1M",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/process-subscription/monthly",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/monthly",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "pk-xyz-eng_eb4b7-8782-1b469ed27852"
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

    //----subscription_daily
    public function subscription_daily()
    {
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
                    "ok" => "https://xoss.games/process-subscription/daily",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/daily",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
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

    //----subscription_weekly
    public function subscription_weekly()
    {
        $plan = 'weekly';
        //----weekly package
        if ($plan == 'weekly') {
            // Prepare data to send API request
            $data = [
                "amount" => 9.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1W",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/process-subscription/weekly",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/weekly",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "pk-xyz-eng_eb4b7-8782-1b469ed27852"
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

    //----subscription_monthly
    public function subscription_monthly()
    {
        $plan = 'monthly';
         //--monthly package
         if ($plan == 'monthly') {
            // Prepare data to send API request
            $data = [
                "amount" => 39.99,
                "currency" => "BDT",
                "productDescription" => "XossGames",
                "subscriptionPeriod" => "P1M",
                "stopMessage" => "STOP SUBSCRIPTION",
                "urls" => [
                    "ok" => "https://xoss.games/process-subscription/monthly",
                    "deny" => "https://xoss.games/deny",
                    "error" => "https://xoss.games/error"
                    // "ok" => "http://127.0.0.1:8000/process-subscription/monthly",
                    // "deny" => "http://127.0.0.1:8000/deny",
                    // "error" => "http://127.0.0.1:8000/error"
                ],
                "operatorId" => "GRA-BD",
                "referenceId" => "pk-xyz-eng_eb4b7-8782-1b469ed27852"
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
}
