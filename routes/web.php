<?php

use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

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
// Route::get('/message', [SettingController::class, 'index'])->middleware(['auth'])->name('setting.system');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');

    Route::get('/chat/messages', [ChatController::class, 'messages']);
    Route::post('/chat/message', [ChatController::class, 'store']);

    Route::get('/profile', [UserController::class, 'profile'])->name('profile.user');
    Route::post('/profile', [UserController::class, 'profileUpdate'])->name('profile.update');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
