<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRenew;
use Illuminate\Http\Request;

class RenewController extends Controller
{
    //---today_renew
    public function today_renew()
    {
         //--common variable
         $currentDate = date('Y-m-d');
         $todayRenews = PurchaseRenew::whereDate('created_at', $currentDate)->with('Subscriber')->latest()->paginate(20);
         $todayRenewCount = PurchaseRenew::whereDate('created_at', $currentDate)->count();
         return view('backend.pages.renew.today', [
            'todayRenews'=>$todayRenews,
            'todayRenewCount'=>$todayRenewCount,
         ]);
 
    }

    //---weekly_renew
    public function weekly_renew()
    {
         //--common variable
         $startOfWeek = now()->startOfWeek();
         $endOfWeek = now()->endOfWeek();

         $weeklyRenews = PurchaseRenew::whereBetween('created_at', [$startOfWeek, $endOfWeek])->latest()->paginate(20);
         $weeklyRenewCount = PurchaseRenew::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
         return view('backend.pages.renew.weekly', [
            'weeklyRenews'=>$weeklyRenews,
            'weeklyRenewCount'=>$weeklyRenewCount,
         ]);
 
    }

    //---monthly_renew
    public function monthly_renew()
    {
        $currentMonth = date('m');

        $monthlyRenews = PurchaseRenew::whereMonth('created_at', $currentMonth)->latest()->paginate(20);
        $monthlyRenewCount = PurchaseRenew::whereMonth('created_at', $currentMonth)->count();
         return view('backend.pages.renew.monthly', [
            'monthlyRenews'=>$monthlyRenews,
            'monthlyRenewCount'=>$monthlyRenewCount,
         ]);
 
    }

    //---total_renew
    public function total_renew()
    {
        $totalRenews = PurchaseRenew::latest()->paginate(20);
        $totalRenewCount = PurchaseRenew::count();
         return view('backend.pages.renew.total', [
            'totalRenews'=>$totalRenews,
            'totalRenewCount'=>$totalRenewCount,
         ]);
 
    }
}
