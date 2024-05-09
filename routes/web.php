<?php

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

/*Route::get('/', function () {
    return view('index');
});*/
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/user', function (){
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('user.index', ['user' => $user]);
})->name('user');

Route::get('/search', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
//Route::get('/search', [\App\Http\Controllers\AdvertisementController::class, 'showAdvertisements'])->name('advertisements.index');

//Route::get('/create-advertisement', 'AdvertisementController@create')->name('createAdvertisement');
/*Route::get('/create-advertisement', function () {
    return view('advertisement.create');
})->name('create-advertisement');*/

Route::get('/create-advertisement', [\App\Http\Controllers\AdvertisementController::class, 'createPage'])->name('create-advertisement');

Route::get('/advertisements/{id}', [\App\Http\Controllers\AdvertisementController::class, 'show'])->name('show-advertisement');

Route::get('/user/{userId}', [\App\Http\Controllers\AdvertisementController::class, 'showProfile'])->name('show-user-profile');

Route::get('/response', [\App\Http\Controllers\AdvertisementController::class, 'respondToAd'])->name('response-to-ad');
