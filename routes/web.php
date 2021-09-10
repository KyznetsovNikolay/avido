<?php

use App\Http\Controllers\Cabinet\HomeController;
use Illuminate\Support\Facades\Auth;
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
        'middleware' => ['auth', 'can:admin.panel'],
    ],
    function () {
        Route::get('/', App\Http\Controllers\Admin\HomeController::class)->name('home');
        Route::post('users/store', \App\Http\Controllers\Admin\Users\Crud\StoreAction::class)->name('users.store');
        Route::get('users/create', \App\Http\Controllers\Admin\Users\Crud\CreateAction::class)->name('users.create');
        Route::get('users', \App\Http\Controllers\Admin\Users\Crud\IndexAction::class)->name('users.index');
        Route::get('users/{user}', \App\Http\Controllers\Admin\Users\Crud\ShowAction::class)->name('users.show');
        Route::delete('users/{user}', \App\Http\Controllers\Admin\Users\Crud\DeleteAction::class)->name('users.destroy');
        Route::put('users/{user}', \App\Http\Controllers\Admin\Users\Crud\UpdateAction::class)->name('users.update');
        Route::get('users/{user}/edit', \App\Http\Controllers\Admin\Users\Crud\ShowEditFormAction::class)->name('users.edit');
        Route::post('/users/{user}/verify', App\Http\Controllers\Admin\Users\Crud\VerifyAction::class)->name('users.verify');
    }
);
