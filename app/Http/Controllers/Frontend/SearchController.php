<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->get('keyword');
        $games = Game::where('game_name', 'LIKE', '%' . $search . '%')->get();

        return view('frontend.pages.searchGames', compact('games'));
    }

    
}
