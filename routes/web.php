<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

/*
|--------------------------------------------------------------------------
| LICENSE
|--------------------------------------------------------------------------
| Code that written below is belong to Zain Alwan Wima Irfani. You may
| not use, share, modify, and study without the author's permission
| (zainalwan4@gmail.com).
*/

Route::middleware(['is.not.logged.in'])->group(function() {
    Route::get('register', [UserController::class, 'register']);
    Route::post('register', [UserController::class, 'store']);

    Route::get('login', [UserController::class, 'login']);
    Route::post('login', [UserController::class, 'authenticate']);

    Route::get('forgot_password', [UserController::class, 'forgotPassword']);
    Route::post('forgot_password', [UserController::class, 'sendRecovertyAccountMail']);
});

Route::get('log_out', [UserController::class, 'logOut'])->middleware('is.logged.in');

Route::middleware(['is.logged.in', 'is.active.account'])->group(function() {
    Route::get('/', function () {
        return view('pages.home');
    });

    Route::get('change_password', [UserController::class, 'changePassword']);
    Route::put('change_password', [UserController::class, 'updatePassword']);

    Route::get('delete_account', [UserController::class, 'deleteAccount']);
    Route::post('delete_account', [UserController::class, 'resendDeleteAccountConfirmationMail']);
    Route::get('delete_account/{delete_account_token}', [UserController::class, 'destroyAccount']);
});

Route::middleware(['is.logged.in', 'is.not.active.account'])->group(function() {
    Route::get('verify', [UserController::class, 'verify']);
    Route::post('verify', [UserController::class, 'resendEmailVerificationMail']);
    Route::get('verify/{email_verification_token}', [UserController::class, 'activateAccount']);
});

Route::middleware(['is.logged.in', 'is.blocked.account'])->group(function() {
    Route::get('warning', [UserController::class, 'warning']);
    Route::post('warning', [UserController::class, 'sendRecovertyAccountMail']);
});

Route::get('reset_password/{reset_password_token}', [UserController::class, 'resetPassword']);
Route::put('reset_password/{reset_password_token}', [UserController::class, 'updatePassword']);
