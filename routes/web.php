<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\GamePlayController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MobilePagesController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SubscriptionProcessController;
use App\Http\Controllers\Frontend\SupportController as FrontendSupportController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'checkSubscription'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/test_code', [HomeController::class, 'test_code'])->name('test_code');
    Route::get('/api_test', [HomeController::class, 'api_test'])->name('homapi_teste');
    Route::get('/after-subscription', [FrontendController::class, 'afterSubscription'])->name('afterSubscription');
    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::get('/support', [FrontendSupportController::class, 'support'])->name('support');
    Route::post('/support/store', [FrontendSupportController::class, 'support_store'])->name('support.store');
    Route::post('/contact', [ContactController::class, 'storeContact'])->name('contact.store');
    Route::get('/faq', [FAQController::class, 'faq'])->name('faq');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/blogs/{slug}', [HomeController::class, 'single_blogs'])->name('single_blogs');
    Route::get('/about-us', [AboutController::class, 'aboutUs'])->name('aboutUs');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
    Route::get('/terms-condition', [HomeController::class, 'terms_condition'])->name('terms.condition');

    Route::get('/login', [MobilePagesController::class, 'login'])->name('user.login')->middleware('logincheck');

    // Route::get('/registration', [MobilePagesController::class, 'registration'])->name('user.registration');
    Route::get('/profile', [MobilePagesController::class, 'profile'])->name('user.profile');
    Route::get('/profile-এ', [MobilePagesController::class, 'profiles'])->name('user.profiles');
    Route::get('/packages', [MobilePagesController::class, 'packages'])->name('user.packages');
    Route::get('/logout', [FrontendController::class, 'logout'])->name('logout');
    Route::get('/process-subscription/{plan}', [SubscriptionProcessController::class, 'processSubscription']);
    Route::get('/deny', [SubscriptionProcessController::class, 'subscriptionDeny']);
    Route::get('/error', [SubscriptionProcessController::class, 'subscriptionError']);
    Route::get('/free-games/play/{gameName}', [GamePlayController::class, 'free_game'])->name('free.game');
    Route::get('/free-games/desk/{gameName}', [GamePlayController::class, 'free_desktopGamePlay'])->name('freedeskGame');
    
     Route::group(['middleware' => 'packageRouteProtected'], function () {
        //--all package route
        Route::get('/packages', [MobilePagesController::class, 'packages'])->name('user.packages');
         require __DIR__ .'/promotion.php';
    });
    Route::get('/games/{gameName}/play', [GamePlayController::class, 'gamePlay'])->name('game');
    Route::group(['middleware' => 'subscriber'], function () {
        Route::get('/game-details/{game}', [GamePlayController::class, 'gameDetails'])->name('gameDetails');
        // Route::get('/games/{gameName}/play', [GamePlayController::class, 'gamePlay'])->name('game');
        Route::get('/games/{gameName}/desk', [GamePlayController::class, 'desktopGamePlay'])->name('deskGame');
        Route::get('/unsubscribe', [FrontendController::class, 'unsubscribe'])->name('unsubscribe');
    });
});

require __DIR__ .'/admin.php';


//Config cache clear
Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    dd("All clear!");
});

//--storage link

Route::get('/storage-link', function () {
    Artisan::call('storage:link');

    dd('Storage Link Success');
});
