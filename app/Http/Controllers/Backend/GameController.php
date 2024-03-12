<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('backend.pages.game.game_show', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.pages.game.game_add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_name' => 'required|unique:games,game_name',
            'game_description' => 'required',
            'category_name' => 'required',
            'is_free' => 'required',
            'is_exclusive' => 'required',
            'game_thumbnail' => 'required|image',
            'game_banner' => 'required|image',
            'game_zip_file' => 'required|mimes:zip,rar',
        ]);

        $allData = $request->all();

        // Game thumbnail Upload
        $thumbFile = $allData['game_thumbnail'];
        $thumbnailName = time() . '-' . $thumbFile->getClientOriginalName();
        $thumbFile->move(public_path('assets/frontend/images/uploads/games_img'), $thumbnailName);

        //---game zip file upload
        $file = $request->file('game_zip_file');
        $zip = new ZipArchive();
        $zip->open($file->path());
        $pathName = 'AllGames/' . Str::slug($request->game_name, '-');
        $zip->extractTo($pathName);

        // Game Banner Upload
        $bannerFile = $allData['game_banner'];
        $bannerName = time() . '-' . $bannerFile->getClientOriginalName();
        $bannerFile->move(public_path('assets/frontend/images/uploads/games_img'), $bannerName);


        // Game Table datas
        $game = [
            'game_name' => $allData['game_name'],
            'game_description' => $allData['game_description'],
            'game_thumbnail' => $thumbnailName,
            'game_banner' => $bannerName,
            'is_free' => $allData['is_free'],
            'is_exclusive' => $allData['is_exclusive'],
            'game_file' => Str::slug($request->game_name, '-'),
            'zip_file_name'=> $pathName,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keyword'=>$request->meta_keyword,
        ];

        // Insert data on Game Table
        if (Game::create($game)) {
            $uploadedGame = Game::where('game_name', $allData['game_name'])->first();
            // Add Game Categories
            foreach ($allData['category_name'] as $category) {
                $addCategory = [
                    'game_id' => $uploadedGame->id,
                    'category_id' => $category,
                ];

                GameCategory::create($addCategory);
            }
        }

        return redirect()->route('games.index')->with('success', 'Game Inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $categories = Category::all();
        return view('backend.pages.game.game_edit', compact('game', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'game_name' => 'required',
            'game_description' => 'required',
            'category_name' => 'required',
            'is_free' => 'required',
            'is_exclusive' => 'required',
            'game_thumbnail' => 'image',
            'game_banner' => 'image',
            'game_zip_file' => 'mimes:zip,rar',
        ]);

        $allData = $request->all();

        /////////// Game thumbnail Upload process start ///////////////
        $thumbFile = $allData['game_thumbnail'] ?? 0;
        $thumbnailName = $game->game_thumbnail;
        // Game thumbnail Delete previous and upload new
        if ($thumbFile && $thumbFile->getClientOriginalName() !== $game->game_thumbnail) {
            $thumbnailName = time() . '-' . $thumbFile->getClientOriginalName();
            if(file_exists(public_path('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail))){
                unlink(public_path('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail));
            }
            $thumbFile->move(public_path('assets/frontend/images/uploads/games_img'), $thumbnailName);
        }
        /////////// Game thumbnail Upload process End ///////////////

        /////////// Game zip file Upload process start ///////////////
        if($request->hasFile('game_zip_file')){
            $oldFile = $game->game_file;
            $oldFilePath = 'AllGames/' . $oldFile;
            if ($oldFilePath) {
                File::deleteDirectory(public_path($oldFilePath));
            }

            $file = $request->file('game_zip_file');
            $zip = new ZipArchive();
            $zip->open($file->path());
            $pathName = 'AllGames/' . Str::slug($request->game_name, '-');
            $zip->extractTo($pathName);

            $game->update([
                'zip_file_name'=> $pathName,
            ]);
        }
        /////////// Game zip file Upload process End ///////////////


         /////////// Game Banner Upload process start ///////////////
         $bannerFile = $allData['game_banner'] ?? 0;
         $bannerName = $game->game_banner;
         // Game thumbnail Delete previous and upload new
         if ($bannerFile && $bannerFile->getClientOriginalName() !== $game->game_banner) {
             $bannerName = time() . '-' . $bannerFile->getClientOriginalName();
             if(file_exists(public_path('assets/frontend/images/uploads/games_img/' . $game->game_banner))){
                unlink(public_path('assets/frontend/images/uploads/games_img/' . $game->game_banner));
             }
             $bannerFile->move(public_path('assets/frontend/images/uploads/games_img'), $bannerName);
         }
         /////////// Game Banner Upload process End ///////////////

        // Game Table datas
        $updatedGame = [
            'game_name' => $allData['game_name'],
            'game_description' => $allData['game_description'],
            'game_thumbnail' => $thumbnailName,
            'game_banner' => $bannerName,
            'is_free' => $allData['is_free'],
            'is_exclusive' => $allData['is_exclusive'],
            'game_file' => str_replace(" ", "-", strtolower($allData['game_name'])),
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'meta_keyword'=>$request->meta_keyword,
        ];

        // Insert data on Game Table and if true update the categories
        if ($game->update($updatedGame)) {
            // Delete All Categories
            $uploadedGame = Game::where('game_name', $allData['game_name'])->first();
            GameCategory::where('game_id', $uploadedGame->id)->delete();
            // Add Game Categories
            foreach ($allData['category_name'] as $category) {
                $addCategory = [
                    'game_id' => $uploadedGame->id,
                    'category_id' => $category,
                ];

                GameCategory::create($addCategory);
            }
        }

        return redirect()->route('games.index')->with('success', 'Game Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        if(file_exists(public_path('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail))){
            unlink(public_path('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail));
        }

        $game->delete();

        return back()->with('delete', 'The post has been deleted successfully.');
    }
}
