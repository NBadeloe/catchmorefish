<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/locatie', 'LocatieController');
Route::resource('/leverancier', 'LeverancierController');
Route::resource('/user', 'UsersController');
Route::resource('/artikel', 'ArtikelController');
Route::resource('/voorraad', 'VoorraadController');

Route::post('product', 'KlantController@search')->name('klant.search');
Route::get('product-detail/', 'KlantController@productDetail')->name('klant.productDetail');
//
//Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
//    Route::resource('/users', 'UsersController');
//    Route::resource('/locatie', 'Locatieontroller');
//    Route::resource('/leverancier', 'LeverancierController');
//
//});
