<?php



//--clickadilla promotion url ---

use App\Http\Controllers\Frontend\ClickadillaController;
use Illuminate\Support\Facades\Route;

Route::get('/clickadilla/daily', [ClickadillaController::class, 'daily_package']);
Route::get('/clickadilla/weekly', [ClickadillaController::class, 'weekly_package']);
Route::get('/clickadilla/monthly', [ClickadillaController::class, 'monthly_package']);
Route::get('/package_clickadilla/daily', [ClickadillaController::class, 'promotion_daily'])->name('clickadilla.daily');
Route::get('/package_clickadilla/weekly', [ClickadillaController::class, 'promotion_weekly'])->name('clickadilla.weekly');
Route::get('/package_clickadilla/monthly', [ClickadillaController::class, 'promotion_monthly'])->name('clickadilla.monthly');
//--- clickadilla- process-subscription
Route::get('/clickadilla/process-subscription', [ClickadillaController::class, 'process_sub']);
