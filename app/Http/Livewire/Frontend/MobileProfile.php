<?php

namespace App\Http\Livewire\Frontend;

use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class MobileProfile extends Component
{
    use WithFileUploads;
    public $name;
    public $phone_num;
    public $temp2_pro_pic;
    public $profile_pic;
    public $unsub_btn = 0;
    public $error;

    public function mount()
    {
        $subscriber = Subscriber::where('acr', Auth::guard('subscriber')->user()->acr)->first();
        $subscriptionDetails = PurchaseDetail::where('subscriber_id', $subscriber->id)->latest()->first();
        if (!$subscriptionDetails || $subscriptionDetails->unsubscribed) {
            $this->unsub_btn = 0;
        } elseif (now()->setTimezone("Asia/Dhaka")->timestamp < $subscriptionDetails->end_time) {
            $this->unsub_btn = 1;
        }

        $this->name = $subscriber->name;
        $this->phone_num = $subscriber->phone_num;
        $this->profile_pic = $subscriber->profile_pic;
    }

    public function update()
    {
        $subscriber = Subscriber::where('acr', Auth::guard('subscriber')->user()->acr)->first();

        if ($this->temp2_pro_pic) {
            $this->validate([
                'temp2_pro_pic' => 'image|max:1024',
            ]);
            if ($this->profile_pic) {
                unlink(public_path('storage/' . $this->profile_pic));
            }

            $profile_pic_path = time() . '-' . $this->temp2_pro_pic->getClientOriginalName();
            $this->temp2_pro_pic->storeAs('public', $profile_pic_path);
            $subscriber->profile_pic = $profile_pic_path;
        }

        $subscriber->name = $this->name;
        $subscriber->phone_num = $this->phone_num;

        $subscriber->update();
        return redirect()->route('user.profile')->with('success', 'Profile Updated Successfully !');
    }

    public function logout()
    {
        Auth::guard('subscriber')->logout();
        return redirect('/');
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


    public function render()
    {
        return view('livewire.frontend.mobile-profile');
    }
}
