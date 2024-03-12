<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\DeviceInfo;
use Illuminate\Http\Request;

class TrafficController extends Controller
{
    //--index
    public function index()
    {
        //traffic
        $currentDate = date('Y-m-d');
        $previousDate = date('Y-m-d', strtotime('-1 day', strtotime($currentDate)));
        $previousTraffic = DeviceInfo::where('date', $previousDate)->count();
        $TodayTraffic = DeviceInfo::where('date', $currentDate)->count();
        $TotalTraffic = DeviceInfo::count();

        $traffics = DeviceInfo::latest()->paginate(20);
        return view('backend.pages.traffic.index', [
            'previousTraffic'=>$previousTraffic,
            'TodayTraffic'=>$TodayTraffic,
            'TotalTraffic'=>$TotalTraffic,
            'traffics'=>$traffics,
        ]);
    }

    //--others
    public function others()
    {
        //traffic
        $currentDate = date('Y-m-d');
        $previousDate = date('Y-m-d', strtotime('-1 day', strtotime($currentDate)));
        $previousTraffic = DeviceInfo::where('date', $previousDate)->where('source', 'cs')->count();
        $TodayTraffic = DeviceInfo::where('date', $currentDate)->where('source', 'cs')->count();
        $TotalTraffic = DeviceInfo::where('source', 'cs')->count();

        $traffics = DeviceInfo::where('source', 'cs')->latest()->paginate(20);
        return view('backend.pages.traffic.other', [
            'previousTraffic'=>$previousTraffic,
            'TodayTraffic'=>$TodayTraffic,
            'TotalTraffic'=>$TotalTraffic,
            'traffics'=>$traffics,
        ]);
    }
}
