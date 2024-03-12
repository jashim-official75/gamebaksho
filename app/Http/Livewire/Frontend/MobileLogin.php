<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use App\Models\SubscriberDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class MobileLogin extends Component
{
    public $phone_num;
    public $error;

    protected $rules = [
        'phone_num' => 'required|numeric',
    ];

    public function login(Request $request)
    {
        $this->validate();
        if (substr($this->phone_num, 0, 2) == "88"){
            $this->phone_num = '88'.str_replace('88', '', $this->phone_num);
        }elseif (substr($this->phone_num, 0, 3) == "+88"){
            $this->phone_num = '88'.str_replace('+88', '', $this->phone_num);
        }else{
            $this->phone_num = '88'.$this->phone_num;
        }

        if($this->phone_num){
            // $url = "https://api.dob-staging.telenordigital.com/partner/acrs?msisdn=$this->phone_num";
            $url = "https://api.dob.telenordigital.com/partner/acrs?msisdn=$this->phone_num";
            // $response = Http::withBasicAuth('naptechlabs-acr-by-msisdn', 'xUJGnt9gz0U4pUbtQotcqvxrPawDCurt')->acceptJson()->get($url);
            $response = Http::withBasicAuth('naptechlabs-acr-by-msisdn', 'ZuBGBmwQkZjyPguysSckchvha8odz0wk')->acceptJson()->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $acrPrefix = $data['acrPrefix']; 
                $subscribber_user = Subscriber::where('acr', $acrPrefix)->first();
                if($subscribber_user){
                    Auth::guard('subscriber')->login($subscribber_user);
                }
                else{
                    return redirect()->route('user.packages');
                }

                Session::flash('success', 'Your Account Login successfully.');
                return redirect()->route('home');
                
            } else {
                return redirect()->route('user.packages');
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.mobile-login');
    }
}
