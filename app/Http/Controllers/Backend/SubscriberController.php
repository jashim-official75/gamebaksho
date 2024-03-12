<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    //--index
    public function index()
    {
        $current_timestamp = now()->setTimezone("Asia/Dhaka")->timestamp;

        $subscribers = PurchaseDetail::with('Subscriber')->latest()->paginate(10);
        $total_sub = PurchaseDetail::count();
        $unsubscribers = PurchaseDetail::where('unsubscribed', 1)->count();
        $subscribers_count = PurchaseDetail::where('unsubscribed', 0)->where('end_time', '<', $current_timestamp)->count();

        //today sale profit 
        $today_date =  $today = date('Y-m-d');
        $today_sub = PurchaseDetail::whereDate('created_at', '=', $today_date)->count();

        //monthly sale profit 
        $currentMonth = date('m');
        $monthly_sub = PurchaseDetail::whereMonth('created_at', '=', $currentMonth)->count();

         //---current subs
        
        $current_subscriber = PurchaseDetail::where('unsubscribed', 0)->where('end_time', '>', $current_timestamp)->count();

        return view('backend.pages.subscriber.subscriber', [
            'subscribers'=>$subscribers,
            'total_sub'=>$total_sub,
            'today_sub'=>$today_sub,
            'monthly_sub'=>$monthly_sub,
            'unsubscribers'=>$unsubscribers,
            'subscribers_count'=>$subscribers_count,
            'current_subscriber'=>$current_subscriber,
        ]);
    }

    //---current_subscriber
    public function current_subscriber()
    {
        $current_timestamp = now()->setTimezone("Asia/Dhaka")->timestamp;
        $current_subscribers = PurchaseDetail::where('end_time', '>', $current_timestamp)->latest()->paginate();
        $current_subscriber_count = PurchaseDetail::where('end_time', '>', $current_timestamp)->count();
        return view('backend.pages.subscriber.current_subscriber', [
            'current_subscribers'=>$current_subscribers,
            'current_subscriber_count'=>$current_subscriber_count,
        ]);
    }
}
