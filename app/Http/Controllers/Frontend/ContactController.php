<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function __construct(Request $request)
    {
        if(Auth::guard('subscriber')->check()){
            $subscriberId = Auth::guard('subscriber')->user()->id;
            $subscriptionDetails = PurchaseDetail::where('subscriber_id', $subscriberId)->latest()->first();
            if(now()->setTimezone("Asia/Dhaka")->timestamp < $subscriptionDetails->end_time){
                $subscribed = 1;
            }
        }
        
    }
    
    public function contact()
    {
        return view('frontend/pages/contact');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required|max:1000',
        ]);

        $contactData = $request->all();

        if($contactData['name'] != null && $contactData['email'] != null && $contactData['comment'] != null){
            Contact::create($contactData);
        }
        
        return redirect()->route('home')->with('success', 'Thank you. We got your message! We will contact you as soon as poosible');
    }
}
