<?php

use App\Http\Controllers\User\RegisterLoginAction;
use App\Http\Controllers\User\UserLoginAction;
use Illuminate\Support\Facades\Route;

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

/**
 *  Register routes for users
 */
Route::post('register', RegisterLoginAction::class);

/**
 *  login routes for users
 */
Route::post('login', UserLoginAction::class);
