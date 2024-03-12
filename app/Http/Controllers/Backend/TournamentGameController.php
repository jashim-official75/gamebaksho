<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TournamentGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use ZipArchive;
use Illuminate\Support\Str;

class TournamentGameController extends Controller
{
    //---index
    public function index()
    {
        $games = TournamentGame::get();
        return view('backend.pages.tournament.all_game', [
            'games' => $games,
        ]);
    }

    //---create
    public function create()
    {
        return view('backend.pages.tournament.create');
    }

    //---store
    public function store(Request $request)
    {
        $request->validate([
            'game_name' => 'required|unique:tournament_games,game_name',
            'game_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'game_fee' => 'required',
            'subscription_period' => 'required',
            'f_price' => 'required',
            'game_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'game_zip_file' => 'required|mimes:zip,rar'
        ]);

        $game_link = route('home') . '/' . 'tournament' . '/' . 'game' . '/' . Str::slug($request->game_name, '-');
        if ($request->hasFile('game_banner')) {
            $request->validate([
                'game_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }
        // Check if a file was zip_file
        $file = $request->file('game_zip_file');
        $zip = new ZipArchive();
        $zip->open($file->path());
        $pathName = 'Tournament/' . Str::slug($request->game_name, '-');
        $zip->extractTo($pathName);

        //--game thumbnail image upload
        if ($request->hasFile('game_thumbnail')) {
            $first_image_name = uniqid() . '_' . 'tournament' . '.' . $request->file('game_thumbnail')->extension();
            $request->file('game_thumbnail')->move(public_path('uploads/Tournamant/GameImage'), $first_image_name);
        }

        $tournament_game = TournamentGame::create([
            'game_name' => $request->game_name,
            'slug' => Str::slug($request->game_name, '-'),
            'game_link' => $game_link,
            'game_zip_file' => $pathName,
            'image' => $first_image_name,
            'description' => $request->game_description,
            'control' => $request->game_control,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'game_fee' => $request->game_fee,
            'subscription_period' => $request->subscription_period,
            'first_price' => $request->f_price,
            'second_price' => $request->s_price,
            'third_price' => $request->third_price,
            'fourth_price' => $request->fourth_price,
        ]);

        if ($tournament_game) {
            //--game banner upload
            if ($request->hasFile('game_banner')) {
                $banner_image_name = uniqid() . '_' . 'tournament_banner' . '.' . $request->file('game_banner')->extension();
                $request->file('game_banner')->move(public_path('uploads/Tournamant/GameBanner'), $banner_image_name);
                $tournament_game->update([
                    'game_banner' => $banner_image_name
                ]);
            }
        }

        return redirect()->route('tournament.game.index')->with('success', 'Tournamant Game Uploaded Successfully!');
    }

    //---edit
    public function edit($id)
    {
        $t_game = TournamentGame::findOrFail($id);
        return view('backend.pages.tournament.edit', [
            't_game' => $t_game,
        ]);
    }

    //---update
    public function update(Request $request, $id)
    {
        $request->validate([
            'game_name' => 'required',
            'game_description' => 'required',
            'game_fee' => 'required',
            'subscription_period' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'f_price' => 'required',
        ]);

        if ($request->hasFile('game_banner')) {
            $request->validate([
                'game_banner' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }
        $t_game = TournamentGame::findOrFail($id);

        if ($request->hasFile('game_zip_file') == '') {
            $t_game->update([
                'game_name' => $request->game_name,
                'description' => $request->game_description,
                'control' => $request->game_control,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'game_fee' => $request->game_fee,
                'subscription_period' => $request->subscription_period,
                'first_price' => $request->f_price,
                'second_price' => $request->s_price,
                'third_price' => $request->third_price,
                'fourth_price' => $request->fourth_price,
            ]);
        }

        //--delete old thumbnail image and new image update
        if ($request->hasFile('game_thumbnail')) {
            $request->validate([
                'game_thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            $oldFile = $t_game->image;
            $oldPath = 'uploads/Tournamant/GameImage/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }

            $NewName = uniqid() . '_' . 'thumbnail_image_update' . '.' . $request->file('game_thumbnail')->extension();
            $request->file('game_thumbnail')->move(public_path('uploads/Tournamant/GameImage'), $NewName);
            $t_game->update([
                'image' => $NewName,
            ]);
        }

        //--delete old banner image and new banner image update
        if ($request->hasFile('game_banner')) {

            $oldBanner = $t_game->game_banner;
            $oldBannerPath = 'uploads/Tournamant/GameBanner/' . $oldBanner;
            if ($oldBannerPath) {
                File::delete(public_path($oldBannerPath));
            }

            $NewBannerName = uniqid() . '_' . 'banner_image_update' . '.' . $request->file('game_banner')->extension();
            $request->file('game_banner')->move(public_path('uploads/Tournamant/GameBanner'), $NewBannerName);
            $t_game->update([
                'game_banner' => $NewBannerName,
            ]);
        }

        //--delete old game asset and new game file update
        if ($request->hasFile('game_zip_file')) {
            $game_link = route('home') . '/' . 'tournament' . '/' . 'game' . '/' . Str::slug($request->game_name, '-');
            $request->validate([
                'game_zip_file' => 'required|mimes:zip,rar'
            ]);
            $oldFile = $t_game->slug;
            $oldFilePath = 'Tournament/' . $oldFile;
            if ($oldFilePath) {
                File::deleteDirectory(public_path($oldFilePath));
            }

            $file = $request->file('game_zip_file');
            $zip = new ZipArchive();
            $zip->open($file->path());
            $pathName = 'Tournament/' . Str::slug($request->game_name, '-');
            $zip->extractTo($pathName);

            $t_game->update([
                'game_name' => $request->game_name,
                'slug' => Str::slug($request->game_name, '-'),
                'game_link' => $game_link,
                'game_zip_file' => $pathName,
                'description' => $request->game_description,
                'control' => $request->game_control,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'game_fee' => $request->game_fee,
                'subscription_period' => $request->subscription_period,
                'first_price' => $request->f_price,
                'second_price' => $request->s_price,
                'third_price' => $request->third_price,
                'fourth_price' => $request->fourth_price,
            ]);
        }

        return redirect()->route('tournament.game.index')->with('success', 'Tournamant Game Updated Successfully!');
    }

    //--delete
    public function delete($id)
    {
        $t_game = TournamentGame::findOrFail($id);
        if ($t_game->image) {
            $oldFile = $t_game->image;
            $oldPath = 'uploads/Tournamant/GameImage/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }
        //--delete banner image
        if ($t_game->game_banner) {
            $oldFile = $t_game->game_banner;
            $oldPath = 'uploads/Tournamant/GameBanner/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
        }

        //---delete zip file
        if ($t_game->game_zip_file) {
            $oldFile = $t_game->slug;
            $oldFilePath = 'Tournament/' . $oldFile;
            if ($oldFilePath) {
                File::deleteDirectory(public_path($oldFilePath));
            }
        }
        $t_game->delete();
        return redirect()->route('tournament.game.index')->with('success', 'Tournamant Game Deleted Successfully!');
    }
}
