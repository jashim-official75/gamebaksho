<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TournamentGame;
use App\Models\Frontend\TournamentPaymentDetails;
use App\Models\GameScore;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class TournamentController extends Controller
{
    //--tournament
    public function tournament()
    {
        $games = TournamentGame::get();
        return view('frontend.tournament.index', [
            'games' => $games,
        ]);
    }

  

    //--game_details
    public function game_details($slug)
    {
        $subscriber_id = Auth::guard('subscriber')->user()->id;
        $game = TournamentGame::where('slug', $slug)->first();
        $tournament_game_id = $game->id;
        $fist_score = GameScore::where('tournament_game_id', $game->id)->orderByDesc('score')->first();
        $second_score = GameScore::where('tournament_game_id', $game->id)->orderByDesc('score')->offset(1)->first();
        $third_score = GameScore::where('tournament_game_id', $game->id)->orderByDesc('score')->offset(2)->first();
        $gamescore = GameScore::where('tournament_game_id', $game->id)->orderByDesc('score')->take(20)->get();
        $my_score_details = GameScore::where('tournament_game_id', $game->id)->where('subscriber_id', $subscriber_id)->first();

        $myScore = 0;
        $myIndex = 0;
        foreach ($gamescore as $index => $score) {
            if ($score->subscriber_id === $subscriber_id) {
                $myScore = $score->score;
                $myIndex = $index + 1; // Adding 1 to convert index to human-readable form
                break;
            }
        }

        $gamescores = $gamescore->splice(3);

        $check_payment = TournamentPaymentDetails::where('subscriber_id', $subscriber_id)->where('tournament_game_id', $tournament_game_id)->where('customer_reference', '!=', null)->first();
        if($check_payment){
            $subscriber = 1;
        }else{
            $subscriber = 0;
        }

        return view('frontend.tournament.game-details', [
            'game' => $game,
            'fist_score' => $fist_score,
            'second_score' => $second_score,
            'third_score' => $third_score,
            'gamescores' => $gamescores,
            'my_score_details' => $my_score_details,
            'myIndex' => $myIndex,
            'myScore' => $myScore,
            'subscriber' => $subscriber,

        ]);
    }

    //--gamePlay
    public function gamePlay($slug)
    {
        $game = TournamentGame::where('slug', $slug)->first();

        return view('frontend.tournament.game-play', [
            'game' => $game,

        ]);
    }
}
