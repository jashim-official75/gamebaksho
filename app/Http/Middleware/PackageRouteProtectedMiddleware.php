<?php

namespace App\Http\Middleware;

use App\Models\PurchaseDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageRouteProtectedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('subscriber')->check()){
            $subscriberId = Auth::guard('subscriber')->user()->id;
            $subscriptionDetails = PurchaseDetail::where('subscriber_id', $subscriberId)->latest()->first();
            if(now()->setTimezone("Asia/Dhaka")->timestamp < $subscriptionDetails->end_time){
               return redirect('/')->with('error', 'You Are Already Subscribed!');
            }
        }
        return $next($request);
    }
}
