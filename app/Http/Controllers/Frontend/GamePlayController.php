<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameCategory;
use App\Models\PurchaseDetail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

class GamePlayController extends Controller
{
    //----gamePlay-----
    public function gamePlay(Request $request, $gameName)
    {
        $agent = new Agent;
        // Mobile Device 
        $mobileResult = $agent->isMobile();
        if ($mobileResult) {
            $game = Game::where('game_file', $gameName)->first();
            return view('frontend.pages.gameplay.mobile', compact('game'));
        }
        // Desktop Device
        $desktopResult = $agent->isDesktop();
        if ($desktopResult) {
            $game = Game::where('game_file', $gameName)->first();
            $categoryId = $game->gameCategory->category_id;
            $relatedGames = GameCategory::where('category_id', $categoryId)->inRandomOrder()->get();
            return view('frontend.pages.gameplay.laptop', compact('game', 'relatedGames'));
        }
        // If device is not mobile or desktop
        $game = Game::where('game_file', $gameName)->first();
        return view('frontend.pages.gameplay.mobile', compact('game'));
    }

    public function free_game(Request $request, $gameName)
    {
        $agent = new Agent;
        // Mobile Device 
        $mobileResult = $agent->isMobile();
        if ($mobileResult) {
            $game = Game::where('game_file', $gameName)->first();
            return view('frontend.pages.gameplay.mobile', compact('game'));
        }
        // Desktop Device
        $desktopResult = $agent->isDesktop();
        if ($desktopResult) {
            $game = Game::where('game_file', $gameName)->first();
            $categoryId = $game->gameCategory->category_id;
            $relatedGames = GameCategory::where('category_id', $categoryId)->inRandomOrder()->get();
            return view('frontend.pages.gameplay.laptop', compact('game', 'relatedGames'));
        }
        // If device is not mobile or desktop
        $game = Game::where('game_file', $gameName)->first();
        return view('frontend.pages.gameplay.mobile', compact('game'));
    }

    public function game(Request $request, $gameName)
    {
        $agent = new Agent;

        // Purchase details of subscriber
        $subscriptionDetails = PurchaseDetail::where('subscriber_id',  Auth::guard('subscriber')->user()->id)->latest()->first();

        // Mobile Device 
        $mobileResult = $agent->isMobile();
        if ($mobileResult) {
            $game = Game::where('game_file', $gameName)->first();

            if ($game->is_free) {
                $response = Http::get('https://games.xoss.games/' . $gameName);
            } else {
                $response = Http::get('https://games.xoss.games/' . $gameName . "/", [
                    "token" => $subscriptionDetails->token,
                ]);
                return $response;
            }
        }
        // Desktop Device
        $desktopResult = $agent->isDesktop();
        if ($desktopResult) {
            $game = Game::where('game_file', $gameName)->first();
            $categoryId = $game->gameCategory->category_id;
            $relatedGames = GameCategory::where('category_id', $categoryId)->inRandomOrder()->get();
            return view('frontend.pages.gameplay', compact('game', 'relatedGames'));
        }
        // If device is not mobile or desktop
        $game = Game::where('game_file', $gameName)->first();
        if ($game->is_free) {
            $response = Http::get('https://games.xoss.games/' . $gameName);
        } else {
            $response = Http::get('https://games.xoss.games/' . $gameName . "/", [
                "token" => $subscriptionDetails->token,
            ]);
        }
        return $response;
    }

    public function gameDetails(Game $game)
    {
        $categoryId = $game->gameCategory->category_id;
        $relatedGames = GameCategory::where('category_id', $categoryId)->limit(3)->get();
        return view('frontend/pages/gameDetails', compact('game', 'relatedGames'));
    }

    public function desktopGamePlay(Request $request, $gameName)
    {
        $game = Game::where('game_file', $gameName)->first();

        if ($game->is_free) {
            $response = Http::get('https://games.xoss.games/' . $gameName);
        } else {
            // Purchase details of subscriber
            $subscriptionDetails = PurchaseDetail::where('subscriber_id',  Auth::guard('subscriber')->user()->id)->latest()->first();

            $response = Http::get('https://games.xoss.games/' . $gameName . "/", [
                "token" => $subscriptionDetails->token,
            ]);
        }

        return $response;
    }

    //---free_desktopGamePlay
    public function free_desktopGamePlay($gameName)
    {
        $game = Game::where('game_file', $gameName)->first();
        $response = Http::get('https://games.xoss.games/' . $gameName);
        return $response;
    }
}
