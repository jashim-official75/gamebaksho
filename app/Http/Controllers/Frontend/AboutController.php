<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AboutController extends Controller
{
    public function aboutUs(){

        $notFreeGames = Game::where('is_free', 0)->limit(4)->get();
        return view('frontend/pages/aboutUs', compact('notFreeGames'));
    }
}
