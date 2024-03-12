<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function home(){
        return view('frontend/pages/home');
    }

    public function afterSubscription(){
        return view('frontend/pages/afterSubscription');
    }

    public function gamePlay(){
        return view('frontend/pages/gameplay');
    }
    
    public function unsubscribe()
    {
        $subscriptionDetails = PurchaseDetail::where('subscriber_id',  Auth::guard('subscriber')->user()->id)->latest()->first();
        $acr = $subscriptionDetails->customer_reference;

        // check if the subscriber time is end?
        if (now()->setTimezone("Asia/Dhaka")->timestamp < $subscriptionDetails->end_time) {

            // Unsubscription message sening API
            $data = [
                "outboundSMSMessageRequest" => [
                    "address" => "acr:" . $acr,
                    "senderAddress" => "tel:+88022900",
                    "outboundSMSTextMessage" => [
                        "message" => "আপনার XossGames সাবস্ক্রিপশনটি বাতিল করা হয়েছে। পুনরায় সাবস্ক্রাইব করতে চাইলে প্রবেশ করুন https://xoss.games",
                    ],
                    "senderName" => "22900",
                    "messageType" => "ARN"
                ]
            ];
            $jsonData = json_encode($data);
            $url = "https://api.dob.telenordigital.com/partner/smsmessaging/v2/outbound/tel%3A%2B88022900/requests";
            $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->withBody($jsonData, 'application/json')->acceptJson()->post($url);
            info($response->body());


            if ($response->successful()) {
                // Invalidate the customer acr
                $url = "https://api.dob.telenordigital.com/partner/acrs/" . $acr;
                $response = Http::withBasicAuth('naptechlabs', 'DN9ykPiLrTghLwbzXpq7kwotb0JDvbSu')->delete($url);
                info($response->body());
                if ($response->successful()) {
                    // Update Database
                    $subscriptionDetails->unsubscribed = 1;
                    if ($subscriptionDetails->update()) {                      
                        return redirect('/')->with('success', "Unsubscribed!");
                    }
                }

                return redirect()->back()->with('error', 'Ubsubscription failed! Please try again.');
            }
            return redirect()->back()->with('error', 'Ubsubscription failed! Please try again.');
        }
        return redirect()->back()->with('error', 'Ubsubscription failed! Please try again.');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('subscriber')->logout();
        return redirect('/');
    }
    
}
