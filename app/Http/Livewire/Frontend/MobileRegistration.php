<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use App\Models\SubscriberDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class MobileRegistration extends Component
{
    public $phone_num;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'phone_num' => 'required|numeric|unique:subscribers',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6',
    ];

    public function register(Request $request)
    {
        $this->validate();
        $subscriber = new Subscriber();
        if (substr($this->phone_num, 0, 2) == "88"){
            $subscriber->phone_num = str_replace('88', '', $this->phone_num);
        }elseif (substr($this->phone_num, 0, 3) == "+88"){
            $subscriber->phone_num = str_replace('+88', '', $this->phone_num);
        }else{
            $subscriber->phone_num = $this->phone_num;
        }
        $subscriber->password = Hash::make($this->password);
        if ($subscriber->save()) {
            if (Auth::guard('subscriber')->attempt(['phone_num' => $subscriber->phone_num, 'password' => $this->password])) {
                $subscriber_details = new SubscriberDetail();
                $agent = new Agent();

                $subscriber_details->subscriber_id = Auth::guard('subscriber')->user()->id;
                $subscriber_details->device = $agent->device();
                $subscriber_details->ip = $request->ip();
                $subscriber_details->platform = $agent->platform();
                $subscriber_details->browser = $agent->browser();
                $subscriber_details->save();
                return redirect()->route('home');
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.mobile-registration');
    }
}
