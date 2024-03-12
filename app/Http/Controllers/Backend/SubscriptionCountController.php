<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionCountController extends Controller
{
    //--date_based_subscriber_count
    public function date_based_subscriber_count(Request $request)
    {
        $date = $request->date;
        return $subscriber = PurchaseDetail::whereDate('created_at', $date)->count();
    }
    //--month_based_subscriber_count
    public function month_based_subscriber_count(Request $request)
    {
        $month = $request->month;
        $startOfMonth = Carbon::parse($month)->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::parse($month)->endOfMonth()->format('Y-m-d');
       return $subsriber = PurchaseDetail::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
    }
    //--year_based_subscriber_count
    public function year_based_subscriber_count(Request $request)
    {
        $year = $request->year;
       return $subsriber = PurchaseDetail::whereYear('created_at', $year)->count();
    }
}
