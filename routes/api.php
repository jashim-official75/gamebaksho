<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\APISubscriptionDeactiveController;
use App\Http\Controllers\Frontend\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/staging/subscription/deactive/', [APISubscriptionDeactiveController::class, 'deactive']);
Route::post('/subscription/deactive/', [APISubscriptionDeactiveController::class, 'deactive']);




