<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GameController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\RegisterController as BackendRegisterController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubscriptionCountController;
use App\Http\Controllers\Backend\SupportController;
use App\Http\Controllers\Backend\TournamentGameController;
use App\Http\Controllers\Backend\TournamentPaymentController;
use App\Http\Controllers\Backend\TrafficController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\PromotionPackageController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\DifferentPackageController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\GamePlayController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\RenewController;
use App\Http\Controllers\Frontend\MobilePagesController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SubscriptionProcessController;
use App\Http\Controllers\Frontend\ResetPasswordController;
use App\Http\Controllers\Frontend\SupportController as FrontendSupportController;
use App\Http\Controllers\Frontend\TrafficCompanyController;
use App\Http\Controllers\Frontend\TournamentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameScoreController;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend\ArmorPromotionController;
use App\Http\Controllers\Frontend\ClaroadsPromotionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


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

     //----game lock url 
    Route::get('/AllGames/{game_name}/', [HomeController::class, 'game_url_lock'])->name('game_url_lock');

    //--- tournament and game score route--
    Route::get('/tournaments', [TournamentController::class, 'tournament'])->name('tournament');

    //payment
    Route::get('/tournament/payment/{slug}', [TournamentPaymentController::class, 'tournamant_payment'])->name('tournament.payment');
    Route::get('/tournament/success/{id}', [TournamentPaymentController::class, 'tournamant_payment_success'])->name('tournament.payment.success');
    Route::get('/tournament/deny/{slug}', [TournamentPaymentController::class, 'tournamant_payment_deny'])->name('tournament.payment.deny');
    Route::get('/tournament/error/{slug}', [TournamentPaymentController::class, 'tournamant_payment_error'])->name('tournament.payment.error');
    //end payment

    Route::get('/tournament/GameDetails/{slug}', [TournamentController::class, 'game_details'])->name('tournament.game.details');
    Route::get('/tournament/gamePlay/{slug}', [TournamentController::class, 'gamePlay'])->name('tournament.game.play');

    Route::get('/game-score', [GameScoreController::class, 'updateScore']);

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
         //---- single package page route------//
        Route::get('/package/daily', [DifferentPackageController::class, 'daily_package'])->name('daily_package');
        Route::get('/package/weekly', [DifferentPackageController::class, 'weekly_package'])->name('weekly_package');
        Route::get('/package/monthly', [DifferentPackageController::class, 'monthly_package'])->name('monthly_package');
        Route::get('/package/prepare/{plan}', [DifferentPackageController::class, 'package_prepare'])->name('package.prepare');

        //---direct plan based subscription consent page route
        Route::get('/subscription/daily', [DifferentPackageController::class, 'subscription_daily'])->name('subscription_daily');
        Route::get('/subscription/weekly', [DifferentPackageController::class, 'subscription_weekly'])->name('subscription_weekly');
        Route::get('/subscription/monthly', [DifferentPackageController::class, 'subscription_monthly'])->name('subscription_monthly');

        //---Promotional URL Armor
        Route::get('/armor/daily', [ArmorPromotionController::class, 'armor_daily'])->name('armor_daily');
        Route::get('/armor/weekly', [ArmorPromotionController::class, 'armor_weekly'])->name('armor_weekly');
        Route::get('/armor/monthly', [ArmorPromotionController::class, 'armor_monthly'])->name('armor_monthly');

        //---feedback url
        Route::get('/armor/feedback', [ArmorPromotionController::class, 'feedback'])->name('armor_feedback');

        //----process sub--
        Route::get('/armor/process-subscription', [ArmorPromotionController::class, 'armorProcessSubscription']);
        Route::get('/armor/deny', [ArmorPromotionController::class, 'armorSubscriptionDeny']);
        Route::get('/armor/error', [ArmorPromotionController::class, 'armorSubscriptionError']);
        //---Promotional URL Armor

         //---Promotional URL claroads--//
        Route::get('/claroads/daily', [ClaroadsPromotionController::class, 'claroads_daily'])->name('claroads_daily');
        Route::get('/claroads/weekly', [ClaroadsPromotionController::class, 'claroads_weekly'])->name('claroads_weekly');
        Route::get('/claroads/monthly', [ClaroadsPromotionController::class, 'claroads_monthly'])->name('claroads_monthly');

        //---feedback url
        Route::get('/claroads/feedback', [ClaroadsPromotionController::class, 'claroads_feedback'])->name('claroads_feedback');

        //----process sub--
        Route::get('/claroads/process-subscription', [ClaroadsPromotionController::class, 'claroadsProcessSubscription']);
        Route::get('/claroads/deny', [ClaroadsPromotionController::class, 'claroadsSubscriptionDeny']);
        Route::get('/claroads/error', [ClaroadsPromotionController::class, 'claroadsSubscriptionError']);
        //---Promotional URL claroads end---//

        //---Promotional URL Traffic Company--//
        Route::get('/tc/daily', [TrafficCompanyController::class, 'tc_daily'])->name('tc_daily');
        Route::get('/tc/weekly', [TrafficCompanyController::class, 'tc_weekly'])->name('tc_weekly');
        Route::get('/tc/monthly', [TrafficCompanyController::class, 'tc_monthly'])->name('tc_monthly');
        //---feedback url
        Route::get('/tc/feedback', [TrafficCompanyController::class, 'tc_feedback'])->name('tc_feedback');
        //----process sub--
        Route::get('/tc/process-subscription', [TrafficCompanyController::class, 'tcProcessSubscription']);
        Route::get('/tc/deny', [TrafficCompanyController::class, 'tcSubscriptionDeny']);
        Route::get('/tc/error', [TrafficCompanyController::class, 'tcSubscriptionError']);
        //---Promotional URL Traffic Company end---//

        //---home package based promotion route start----//
        Route::get('/daily', [PromotionPackageController::class, 'daily_package']);
        Route::get('/weekly', [PromotionPackageController::class, 'weekly_package']);
        Route::get('/monthly', [PromotionPackageController::class, 'monthly_package']);
        Route::get('/promotion/daily', [PromotionPackageController::class, 'promotion_daily'])->name('promotion.daily');
        Route::get('/promotion/weekly', [PromotionPackageController::class, 'promotion_weekly'])->name('promotion.weekly');
        Route::get('/promotion/monthly', [PromotionPackageController::class, 'promotion_monthly'])->name('promotion.monthly');
        //--- promotion- process-subscription
        Route::get('/promotion/process-subscription', [PromotionPackageController::class, 'process_sub']);
        //---home package based promotion route end----//

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


Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'loginProcess'])->name('admin.login.process');

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //---ajax request route---
    Route::get('/select_date/subscriber_count', [SubscriptionCountController::class, 'date_based_subscriber_count']);
    Route::get('/select_month/subscriber_count', [SubscriptionCountController::class, 'month_based_subscriber_count']);
    Route::get('/select_year/subscriber_count', [SubscriptionCountController::class, 'year_based_subscriber_count']);
    Route::resource('/game/category', CategoryController::class)->middleware('viewer');
    Route::resource('/games', GameController::class)->middleware('viewer');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    //----renew
    Route::get('/renew', [DashboardController::class, 'renew'])->name('admin.renew');
    Route::get('/today-renew', [RenewController::class, 'today_renew'])->name('admin.today.renew');
    Route::get('/weekly-renew', [RenewController::class, 'weekly_renew'])->name('admin.weekly.renew');
    Route::get('/monthly-renew', [RenewController::class, 'monthly_renew'])->name('admin.monthly.renew');
    Route::get('/total-renew', [RenewController::class, 'total_renew'])->name('admin.total.renew');

    //--register--
    Route::get('/register', [BackendRegisterController::class, 'register'])->name('admin.register')->middleware('viewer');
    Route::post('/register', [BackendRegisterController::class, 'register_store'])->name('admin.register.store')->middleware('viewer');

    //---support route---
    Route::get('/support', [SupportController::class, 'index'])->name('admin.support.index')->middleware('viewer');
    Route::get('/support/{id}', [SupportController::class, 'delete'])->name('admin.newsupport.delete')->middleware('viewer');

     //----blogs----
    Route::get('/blogs', [BlogController::class, 'index'])->name('admin.blogs')->middleware('viewer');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blog.create')->middleware('viewer');
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('admin.blog.store')->middleware('viewer');
    Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit')->middleware('viewer');
    Route::post('/blogs/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update')->middleware('viewer');
    Route::get('/blogs/delete/{id}', [BlogController::class, 'delete'])->name('admin.blog.delete')->middleware('viewer');

    //---subscriber
    Route::get('/subscriber', [SubscriberController::class, 'index'])->name('admin.subscriber');
     Route::get('/current/subscriber', [SubscriberController::class, 'current_subscriber'])->name('admin.current.subscriber');

    //--traffic
    Route::get('/traffic', [TrafficController::class, 'index'])->name('admin.traffic.index');
    Route::get('/traffic/others', [TrafficController::class, 'others'])->name('admin.traffic.other');

    //---users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/subscriber', [UserController::class, 'subscribe_user'])->name('admin.user.subscriber');
    Route::get('/users/unsubscriber', [UserController::class, 'unsubscribe_user'])->name('admin.user.unsubscribe');
    Route::get('/users/nosubscribe', [UserController::class, 'nosubscribe_user'])->name('admin.user.nosubscribe');

    Route::get('/users/nosubscribe/excel', [UserController::class, 'nosubscribe_user_excel'])->name('admin.nosubscriber.user.excel');

    Route::get('/users/unsubscriber/excel', [UserController::class, 'unsubscribe_user_excel'])->name('admin.unsubscriber_user.excel');
    Route::get('/users/subscribe/excel', [UserController::class, 'subscribe_user_excel'])->name('admin.subscriber_user.excel');

    Route::get('/message', [SupportController::class, 'allMessages'])->name('admin.support')->middleware('viewer');
    Route::get('/support/unseen', [SupportController::class, 'unseen'])->name('admin.support.unseen')->middleware('viewer');
    Route::post('/support/mark/{supportId}', [SupportController::class, 'makeMark'])->name('admin.support.mark')->middleware('viewer');
    Route::get('/contact/message/delete/{id}', [SupportController::class, 'contact_message_delete'])->name('admin.contact.delete')->middleware('viewer');

    //---role--
    Route::get('/role', [RoleController::class, 'index'])->name('role.index')->middleware('viewer');

    //---tournament----
    Route::get('/tournament/index', [TournamentGameController::class, 'index'])->name('tournament.game.index')->middleware('viewer');
    Route::get('/tournament/add', [TournamentGameController::class, 'create'])->name('tournament.game.add')->middleware('viewer');
    Route::post('/tournament/store', [TournamentGameController::class, 'store'])->name('tournament.game.store')->middleware('viewer');
    Route::get('/tournament/edit/{id}', [TournamentGameController::class, 'edit'])->name('tournament.game.edit')->middleware('viewer');
    Route::post('/tournament/update/{id}', [TournamentGameController::class, 'update'])->name('tournament.game.update')->middleware('viewer');
    Route::delete('/tournament/delete/{id}', [TournamentGameController::class, 'delete'])->name('tournament.game.destroy')->middleware('viewer');
});


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
