<?php


use App\Http\Controllers\Backend\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GameController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\RegisterController as BackendRegisterController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SubscriptionCountController;
use App\Http\Controllers\Backend\SupportController;
use App\Http\Controllers\Backend\TrafficController;
use App\Http\Controllers\Backend\RenewController;


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
});
