<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SupportMail;
use Illuminate\Http\Request;
use App\Models\Frontend\Support;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class SupportController extends Controller
{
    //---support ----
    public function support()
    {
        return view('frontend.pages.support');
    }

    //--support_store
    public function support_store(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required|email',
            'reason'=>'required',
        ]);

      $support = Support::create([
            'name'=>$request->fullname,
            'phone_number'=>$request->phonenumber,
            'email'=>$request->email,
            'reason'=>$request->reason,
            'regis_number'=>$request->regis_number,
            'subscrb_number'=>$request->sub_number,
            'message'=>$request->message,
        ]);

        $details = [
            'name'=>$request->fullname,
            'phonenumber'=>$request->phonenumber,
            'email'=>$request->email,
            'reason'=>$request->reason,
            'subscrib_number'=>$request->sub_number,
            'register_number'=>$request->regis_number,
            'message'=>$request->message,
        ];
        
        Mail::to('xossgames@gmail.com')->send(new SupportMail($details));
        return redirect()->route('home')->with('success', 'Your Message Has Been Sent Successfully!');
    }
}
