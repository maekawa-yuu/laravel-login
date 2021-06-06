<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::middleware(['guest'])->group(function () {  
    //ログイン画面を表示する
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    //ログイン処理
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    //ホーム画面表示
    Route::get('home', function(){
        return view('home');
    })->name('home');
    //ログアウト
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});