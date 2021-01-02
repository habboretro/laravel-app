<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Settings;
use App\Http\Controllers\HabboImaging;
use App\Http\Controllers\News;
use App\Http\Controllers\Paypal;

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

Route::get('/', Controllers\IndexController::class)
    ->middleware('guest')
    ->name('index');

Route::get('/habbo-imaging/avatarimage', HabboImaging\AvatarController::class)
    ->name('habbo-imaging.avatar');

Route::get('/news', News\IndexController::class)
    ->name('news.index');

Route::get('/news/{news:slug}', News\ShowController::class)
    ->name('news.show');

Route::get('/highscores', Controllers\HighScoreController::class)
    ->name('highscores');

Route::get('/staff', Controllers\StaffController::class)
    ->name('staff');

Route::post('/paypal/checkout/notify', Paypal\NotifyController::class)
    ->name('paypal.notify');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/me', Controllers\MeController::class)
        ->middleware('findretros.redirect')
        ->name('me');

    Route::get('/game', Controllers\GameController::class)
        ->middleware('findretros.redirect')
        ->name('game');

    Route::get('/store', Controllers\StoreController::class)
        ->middleware('findretros.redirect')
        ->name('store');

    Route::get('/settings/email', Settings\EmailController::class)
        ->name('settings.email');

    Route::get('/settings/password', Settings\PasswordController::class)
        ->name('settings.password');

    Route::get('/paypal/checkout/success', Paypal\SucccessController::class)
        ->name('paypal.success');

    Route::get('/paypal/checkout/{amount}', Paypal\CheckoutController::class)
        ->name('paypal.checkout');
});

Route::prefix('api')->group(function () {
    Route::put('/update-email', Settings\UpdateEmailController::class)->middleware('auth:sanctum');
    Route::put('/update-password', Settings\UpdatePasswordController::class)->middleware('auth');
});
