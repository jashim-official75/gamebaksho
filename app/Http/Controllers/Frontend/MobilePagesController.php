<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MobilePagesController extends Controller
{
    public function packages()
    {
        return view('frontend.pages.mobilePackages');
    }

    public function login()
    {
        if(auth()->guard('subscriber')->check()){
            return redirect('/')->with('error', 'You Are Already Login!');
        }
        return view('frontend.pages.mobileLogin');
    }

    public function registration()
    {
        if(Auth::guard('subscriber')->check()){
            return redirect()->route('home');
        }
        return view('frontend.pages.mobileRegistration');
    }

    public function profile()
    {
        if(!Auth::guard('subscriber')->check()){
            return redirect()->route('home');
        }
        return view('frontend.pages.mobileProfile');
    }

    public function profiles()
    {
        if(!Auth::guard('subscriber')->check()){
            return redirect()->route('home');
        }
        return view('frontend.pages.mobileProfile');
    }

}
