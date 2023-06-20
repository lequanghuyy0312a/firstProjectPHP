<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DeviceInfoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.home');
});
Route::get('/home', [CustomAuthController::class,'home']);
Route::get('/', [CustomAuthController::class,'home'])->name('home');

Route::get('/login', [CustomAuthController::class,'login']);
Route::post('/login-account', [CustomAuthController::class,'loginAccount']) -> name('login-account');

Route::get('/register', [CustomAuthController::class,'register']);
Route::post('/register-account', [CustomAuthController::class,'registerAccount']) -> name('register-account');

Route::get('/device', [DeviceInfoController::class,'device']);
Route::get('/detail/{serialNumber}', [DeviceInfoController::class,'detail'])->name('detail');

Route::get('/logout', [CustomAuthController::class,'logout']);
 