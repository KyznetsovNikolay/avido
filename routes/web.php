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
        Route::group(
            [
                'prefix' => 'users',
                'as' => 'users.',
            ],
            function () {
                Route::post('store', \App\Http\Controllers\Admin\Users\Crud\StoreAction::class)->name('store');
                Route::get('create', \App\Http\Controllers\Admin\Users\Crud\CreateAction::class)->name('create');
                Route::get('/', \App\Http\Controllers\Admin\Users\Crud\IndexAction::class)->name('index');
                Route::get('{user}', \App\Http\Controllers\Admin\Users\Crud\ShowAction::class)->name('show');
                Route::delete('{user}', \App\Http\Controllers\Admin\Users\Crud\DeleteAction::class)->name('destroy');
                Route::put('{user}', \App\Http\Controllers\Admin\Users\Crud\UpdateAction::class)->name('update');
                Route::get('{user}/edit', \App\Http\Controllers\Admin\Users\Crud\ShowEditFormAction::class)->name('edit');
                Route::post('{user}/verify', App\Http\Controllers\Admin\Users\Crud\VerifyAction::class)->name('verify');
            }
        );

        Route::group(
            [
                'prefix' => 'regions',
                'as' => 'regions.',
            ],
            function () {
                Route::post('store', \App\Http\Controllers\Admin\Regions\Crud\StoreAction::class)->name('store');
                Route::get('create', \App\Http\Controllers\Admin\Regions\Crud\CreateAction::class)->name('create');
                Route::get('/', \App\Http\Controllers\Admin\Regions\Crud\IndexAction::class)->name('index');
                Route::get('{region}', \App\Http\Controllers\Admin\Regions\Crud\ShowAction::class)->name('show');
                Route::delete('{region}', \App\Http\Controllers\Admin\Regions\Crud\DeleteAction::class)->name('destroy');
                Route::put('{region}', \App\Http\Controllers\Admin\Regions\Crud\UpdateAction::class)->name('update');
                Route::get('{region}/edit', \App\Http\Controllers\Admin\Regions\Crud\ShowEditFormAction::class)->name('edit');
            }
        );

        Route::group(
            [
                'prefix' => 'cities',
                'as' => 'cities.',
            ],
            function () {
                Route::post('{region}/store', \App\Http\Controllers\Admin\Cities\Crud\StoreAction::class)->name('store');
                Route::get('{region}/create', \App\Http\Controllers\Admin\Cities\Crud\CreateAction::class)->name('create');
                Route::get('{city}', \App\Http\Controllers\Admin\Cities\Crud\ShowAction::class)->name('show');
                Route::delete('{city}', \App\Http\Controllers\Admin\Cities\Crud\DeleteAction::class)->name('destroy');
                Route::put('{city}', \App\Http\Controllers\Admin\Cities\Crud\UpdateAction::class)->name('update');
                Route::get('{city}/edit', \App\Http\Controllers\Admin\Cities\Crud\ShowEditFormAction::class)->name('edit');
            }
        );

        Route::group(
            [
                'prefix' => 'adverts/categories',
                'as' => 'adverts.categories.',
            ],
            function () {
                Route::post('store', \App\Http\Controllers\Admin\Adverts\Category\Crud\StoreAction::class)->name('store');
                Route::get('create', \App\Http\Controllers\Admin\Adverts\Category\Crud\CreateAction::class)->name('create');
                Route::get('/', \App\Http\Controllers\Admin\Adverts\Category\Crud\IndexAction::class)->name('index');
                Route::group(
                    [
                        'prefix' => '{category}',
                    ],
                    function () {
                        Route::get('/', \App\Http\Controllers\Admin\Adverts\Category\Crud\ShowAction::class)->name('show');
                        Route::delete('/', \App\Http\Controllers\Admin\Adverts\Category\Crud\DeleteAction::class)->name('destroy');
                        Route::put('/', \App\Http\Controllers\Admin\Adverts\Category\Crud\UpdateAction::class)->name('update');
                        Route::get('/edit', \App\Http\Controllers\Admin\Adverts\Category\Crud\ShowEditFormAction::class)->name('edit');
                        Route::post('/first', \App\Http\Controllers\Admin\Adverts\Category\FirstCategoryAction::class)->name('first');
                        Route::post('/up', \App\Http\Controllers\Admin\Adverts\Category\UpCategoryAction::class)->name('up');
                        Route::post('/down', \App\Http\Controllers\Admin\Adverts\Category\DownCategoryAction::class)->name('down');
                        Route::post('/last', \App\Http\Controllers\Admin\Adverts\Category\LastCategoryAction::class)->name('last');

                        Route::group(
                            [
                                'prefix' => 'attributes',
                                'as' => 'attributes.'
                            ], function () {
                            Route::post('store', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\StoreAction::class)->name('store');
                            Route::get('create', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\CreateAction::class)->name('create');
                            Route::get('{attribute}', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\ShowAction::class)->name('show');
                            Route::delete('{attribute}', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\DeleteAction::class)->name('destroy');
                            Route::put('{attribute}', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\UpdateAction::class)->name('update');
                            Route::get('{attribute}/edit', \App\Http\Controllers\Admin\Adverts\Attribute\Crud\ShowEditFormAction::class)->name('edit');
                        });
                });
        });
    }
);
