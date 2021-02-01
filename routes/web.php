<?php

use App\Http\Controllers;
use App\Http\Controllers\Box;
use App\Http\Controllers\News;
use App\Http\Controllers\PayPal;
use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabboImaging;

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

Route::get('/register/{username}/{referral_code}', '\Laravel\Fortify\Http\Controllers\RegisteredUserController@create')
    ->middleware('guest')
    ->name('register.referral');

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

Route::get('/downloads', Controllers\DownloadController::class)
    ->name('downloads');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', 'Laravel\Fortify\Http\Controllers\AuthenticatedSessionController@destroy')
        ->name('logout');

    Route::get('/banned', Controllers\BannedController::class)
        ->name('banned');

    Route::get('/me', Controllers\MeController::class)
        ->middleware(['banned', 'findretros.redirect'])
        ->name('me');

    Route::get('/game', Controllers\GameController::class)
        ->middleware(['banned', 'findretros.redirect'])
        ->name('game');

    Route::get('/nitro', Controllers\NitroController::class)
	->middleware(['banned', 'findretros.redirect'])
	->name('nitro');

    Route::get('/store', Controllers\StoreController::class)
        ->middleware(['banned', 'findretros.redirect'])
        ->name('store');

    Route::get('/settings/email', Settings\EmailController::class)
        ->middleware('banned')
        ->name('settings.email');

    Route::get('/settings/password', Settings\PasswordController::class)
        ->middleware('banned')
        ->name('settings.password');

    Route::get('/paypal/checkout/verify', PayPal\VerifyController::class)
        ->middleware('banned')
        ->name('paypal.verify');

    Route::get('/paypal/checkout/{amount}', PayPal\CheckoutController::class)
        ->middleware('banned')
        ->name('paypal.checkout');
});

Route::prefix('api')->group(function () {
    Route::post('/purchase/{product}', Controllers\PurchaseProductController::class)->middleware('auth:sanctum');
    Route::put('/update-email', Settings\UpdateEmailController::class)->middleware('auth:sanctum');
    Route::put('/update-password', Settings\UpdatePasswordController::class)->middleware('auth');
    Route::prefix('boxes')->middleware('auth:sanctum')->group(function () {
        Route::get('/', Box\IndexController::class);
        Route::get('/{box}', Box\ShowController::class);
        Route::post('/{box}', Box\PaymentController::class);
    });
});
