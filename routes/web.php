<?php

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
    return view('public.landing');
});

Route::post('/getplans', 'PlanController@getplans')->name("getplans");

Route::get('/plans', function () {
    return view('public.plans');
});

Route::get('/info', function () {
    return view('public.info');
});

Route::get('/traveller-info', function () {
    return view('public.traveller-info');
});

Route::post('/traveller-info', 'TravellerController@create')->name('traveller-info');
Route::post('/traveller-create', 'TravellerController@store')->name('traveller-create');

Route::get('/payment', 'PaymentController@create')->name('payment-form');
