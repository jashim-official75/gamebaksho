<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SubscriptionPackage extends Component
{
    public function daily()
    {
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
            "referenceId" => "naptechlabs-2515-xossgames-subsc"
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

    public function weekly()
    {
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
        // $url = "https://api.dob-staging.telenordigital.com/partner/v3/consent/prepare";

        // Send Request to the API 
        $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);

        // Receive data and redirect for subscription process
        $subscriptionData = json_decode($response->body(), true);
        return redirect($subscriptionData['url']);
    }

    public function monthly()
    {
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
        // $url = "https://api.dob-staging.telenordigital.com/partner/v3/consent/prepare";

        // Send Request to the API 
        $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        // $response = Http::withBasicAuth('naptechlabs', 'RPV3Oey44OIXfL3rjwfWEz2fFuyevIsl')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
        // Receive data and redirect for subscription process
        $subscriptionData = json_decode($response->body(), true);
        return redirect($subscriptionData['url']);
    }



    public function render(Request $request)
    {
        return view('livewire.frontend.subscription-package');
    }
}
