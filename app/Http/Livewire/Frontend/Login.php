<?php

namespace App\Http\Livewire\Frontend;

use App\Models\SubscriberDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Livewire\Component;

class Login extends Component
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
            $this->phone_num = str_replace('88', '', $this->phone_num);
        }elseif (substr($this->phone_num, 0, 3) == "+88"){
            $this->phone_num = str_replace('+88', '', $this->phone_num);
        }else{
            $this->phone_num = $this->phone_num;
        }

        if(Auth::guard('subscriber')->attempt(['phone_num' => $this->phone_num, 'password' => $this->password]))
        {
            $subscriber_details = new SubscriberDetail();
                $agent = new Agent();

                $subscriber_details->subscriber_id = Auth::guard('subscriber')->user()->id;
                $subscriber_details->device = $agent->device();
                $subscriber_details->ip = $request->ip();
                $subscriber_details->platform = $agent->platform();
                $subscriber_details->browser = $agent->browser();
                $subscriber_details->save();
            return redirect('/')->with('success', "You have been logged in");
        }else{
            $this->error = "Plz Subscription Phone Number!";
        }
    }

    public function render()
    {
        return view('livewire.frontend.login');
    }
}
