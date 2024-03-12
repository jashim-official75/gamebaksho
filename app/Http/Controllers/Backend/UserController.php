<?php

namespace App\Http\Controllers\Backend;

use App\Exports\NotSubscriberUserDataExport;
use App\Exports\SubscriberUserDataExport;
use App\Exports\UnsubscriberUserDataExport;
use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //--index
    public function index()
    {
        $users = Subscriber::with('PurchaseDetails')->latest()->paginate(10);
        $total_user = Subscriber::count();
        $subscribers = PurchaseDetail::where('unsubscribed', 0)->count();
        $unsubscribers = PurchaseDetail::where('unsubscribed', 1)->count();
        $usersNotUsedInPurchaseDetails = Subscriber::whereNotIn('id', function ($query) {
            $query->select('subscriber_id')
                  ->from('purchase_details');
        })->count();
        //today users
        $today_date =  $today = date('Y-m-d');
        $today_user = Subscriber::whereDate('created_at', '=', $today_date)->count();

        //monthly users
        $currentMonth = date('m');
        $monthly_user = Subscriber::whereMonth('created_at', '=', $currentMonth)->count();

        return view('backend.pages.subscriber.all_register', [
            'users'=>$users,
            'total_user'=>$total_user,
            'today_user'=>$today_user,
            'monthly_user'=>$monthly_user,
            'subscribers'=>$subscribers,
            'unsubscribers'=>$unsubscribers,
            'usersNotUsedInPurchaseDetails'=>$usersNotUsedInPurchaseDetails,
        ]);
    }

    //---subscribe_user
    public function subscribe_user()
    {
        $current_timestamp = now()->setTimezone("Asia/Dhaka")->timestamp;
        $subscribers = PurchaseDetail::where('unsubscribed', 0)->where('end_time', '<', $current_timestamp)->with('Subscriber')->latest()->paginate(10);
        $subscribers_count = PurchaseDetail::where('unsubscribed', 0)->where('end_time', '<', $current_timestamp)->with('Subscriber')->latest()->count();
        
        return view('backend.pages.user.subscriber', compact('subscribers', 'subscribers_count'));
    }

    //---unsubscribe_user
    public function unsubscribe_user()
    {
       $unsubscribers = PurchaseDetail::where('unsubscribed', 1)->with('Subscriber')->latest()->paginate(10);
        
        return view('backend.pages.user.unsubscriber', compact('unsubscribers'));
    }

    //---nosubscribe_user
    public function nosubscribe_user()
    {
        $usersNotUsedInPurchaseDetails = Subscriber::whereNotIn('id', function ($query) {
            $query->select('subscriber_id')
                  ->from('purchase_details');
        })->paginate(10);
        
        return view('backend.pages.user.no_subscriber', compact('usersNotUsedInPurchaseDetails'));
    }

    //--nosubscribe_user_excel
    public function nosubscribe_user_excel()
    {
        return Excel::download(new NotSubscriberUserDataExport, 'notsubscriber_user.xlsx');
    }

    //--unsubscribe_user_excel
    public function unsubscribe_user_excel()
    {
        return Excel::download(new UnsubscriberUserDataExport, 'unsubscriber_user.xlsx');
    }

    //--subscribe_user_excel
    public function subscribe_user_excel()
    {
        return Excel::download(new SubscriberUserDataExport, 'subscriber_user.xlsx');
    }
}
