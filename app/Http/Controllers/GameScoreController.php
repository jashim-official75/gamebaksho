<?php

namespace App\Http\Controllers;

use App\Models\GameScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameScoreController extends Controller
{
    public function updateScore(Request $request)
    {
        $game_score = $request->game;
        $game_id = $request->game_id;
        $user_id = Auth::guard('subscriber')->user()->id;
        $same_user =  GameScore::where('subscriber_id', $user_id)->first();
        if ($same_user) {
            if ($same_user->score < $game_score) {
                $same_user->update([
                    'score'=>$game_score
                ]);
            }else{
                return 'no update';
            }
        } else {
            GameScore::create([
                'subscriber_id' => $user_id,
                'tournament_game_id' => $game_id,
                'score' => $game_score,
            ]);
        }
    }
}
