<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('personne', \App\Http\Controllers\PersonneController::class);
    Route::resource('marchand', \App\Http\Controllers\MarchandController::class);
    Route::resource('coupon', \App\Http\Controllers\CouponController::class);
  //  Route::get('category/{slug}/films', [FilmController::class, 'index'])->name('films.category');


    /*Route::get('/marchand', 'App\Http\Controllers\marchand@index')->name('marchand.index');
    Route::get('/marchand/create', 'App\Http\Controllers\marchand@create')->name('marchand.create');
    Route::get('/marchand/edit', 'App\Http\Controllers\marchand@edit')->name('marchand.edit');
    Route::get('/marchand/show', 'App\Http\Controllers\marchand@show')->name('marchand.show');
    Route::get('/personne', 'App\Http\Controllers\personne@index')->name('personne.index');
    Route::get('/personne/create', 'App\Http\Controllers\personne@create')->name('personne.create');
    Route::get('/personne/edit', 'App\Http\Controllers\personne@edit')->name('personne.edit');
    Route::get('/personne/show', 'App\Http\Controllers\personne@show')->name('personne.show');*/

    Route::post('/profile', 'App\Http\Controllers\UserController@postProfile')->name('user.postProfile');
    Route::post('/coupons', 'App\Http\Controllers\CouponController@store')->name('coupon.store');
    Route::get('/coupons', 'App\Http\Controllers\CouponController@index')->name('coupon.index');
   // Route::get('personne/{id}/coupons', [CouponController::class, 'index'])->name('coupons.personne');

});
