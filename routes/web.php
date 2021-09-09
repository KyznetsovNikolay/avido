<?php

use App\Http\Controllers\Cabinet\HomeController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cabinet', [HomeController::class, 'index'])->name('cabinet');

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth'],
    ],
    function () {
        Route::get('/', App\Http\Controllers\Admin\HomeController::class)->name('home');
        Route::resource('users', \App\Http\Controllers\Admin\Users\UsersController::class);
        Route::post('/users/{user}/verify', [App\Http\Controllers\Admin\Users\UsersController::class, 'verify'])->name('users.verify');
    }
);
