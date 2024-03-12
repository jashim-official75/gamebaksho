<?php

namespace App\Http\Middleware;

use App\Models\PurchaseDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

class CheckSubscription
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
        $subscribed = 0;
        $unsubs = 0;
        if(Auth::guard('subscriber')->check()){
            $subscriberId = Auth::guard('subscriber')->user()->id;
            $subscriptionDetails = PurchaseDetail::where('subscriber_id', $subscriberId)->latest()->first();
            if(!$subscriptionDetails){
                $subscribed = 0;
            }elseif(now()->setTimezone("Asia/Dhaka")->timestamp < $subscriptionDetails->end_time){
                $subscribed = 1;
            }
            if($subscriptionDetails){
                if($subscriptionDetails->unsubscribed){
                    $unsubs = 1;
                }
            }

            
        }

        $agent = new Agent;
        $isMobile = $agent->isMobile();
        View::share([
            'subscribed' => $subscribed,
            'isMobile' => $isMobile,
            'unsubs' => $unsubs,
        ]);
        return $next($request);
    }
}
