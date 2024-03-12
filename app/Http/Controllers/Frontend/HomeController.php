<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use App\Models\Game;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\DeviceInfo;
use App\Models\Subscriber;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\PurchaseRenew;

class HomeController extends Controller
{
   public function test_code()
    {
        
    }

     public function api_test()
    {
        
    }

    public function home(Request $request)
    {   
        $others_traffic = NULL;
        if ($request->source == 'cs') {
            $others_traffic = $request->source;
        }
        // get  country and store database --
        // $ip = $request->ip();
        $ip = $request->ip();
        $geoinfo = geoip()->getLocation($ip);
        $country = $geoinfo->country;
        $agent = new Agent();
        $today = date("Y-m-d");
        // $country = $agent->country();
        $same_ip = DeviceInfo::where('ip', $ip)->first();
        $mobileResult = $agent->isMobile();
        $desktopResult = $agent->isDesktop();
        if ($same_ip) {
            $same_ip->increment('count_trafic');
            $same_ip->update([
                'country' => $country
            ]);
        } else {
            // Mobile Device 
            if ($mobileResult) {
                DeviceInfo::create([
                    'ip' => $ip,
                    'source' => $others_traffic,
                    'country' => $country,
                    'is_device' => 'mobile',
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                    'count_trafic' => '1',
                    'date' => $today,
                ]);
            }
            //---desktop device
            if ($desktopResult) {
                DeviceInfo::create([
                    'ip' => $ip,
                    'source' => $others_traffic,
                    'country' => $country,
                    'is_device' => 'Desktop',
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                    'count_trafic' => '1',
                    'date' => $today,
                ]);
            }
        }
        //--end get ip address
        $freeGames =  Game::where('is_free', 1)->get();
        $notFreeGames = Game::where('is_free', 0)->latest()->get();
        $subscriber_success = '1';
        return view('frontend/pages/home', compact('freeGames', 'notFreeGames', 'subscriber_success'));
    }

    //---privacy
    public function privacy()
    {
        return view('frontend/pages/privacy');
    }

    //---terms_condition
    public function terms_condition()
    {
        return view('frontend/pages/terms_condition');
    }

    //---game_url_lock
    public function game_url_lock($game_name)
    {
        return $game_name;
        return redirect('/')->with('error', 'Invalid!');
    }

    //---blogs
    public function blogs()
    {
        $blogs = Blog::latest()->get();
        return view('frontend/pages/blogs', compact('blogs'));
    }

    //---singleblogs
    public function single_blogs($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $related_blogs = Blog::take(8)->get();
        return view('frontend/pages/single_blogs', compact('blog', 'related_blogs'));
    }
}
