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

Route::get('/', 'PlanController@index');

Route::view('/axa/travel/eng', 'public.axa-travel');
Route::view('/axa/travel/bm', 'public.axa-travel-bm');
Route::view('/axa/motor/eng', 'public.axa-motor');
Route::view('/axa/motor/bm', 'public.axa-motor-bm');

Route::post('/getplans', 'PlanController@getplans')->name("getplans");

Route::get('/plans', function () {
    return view('public.plans');
});

Route::get('/info', 'PlanController@getinfos')->name("getinfos");

// Route::get('/plans', function () {
//     return view('public.plans');
// });

// Route::get('/info', function () {
//     return view('public.info');
// });

// Route::get('/traveller-info', function () {
//     return view('public.traveller-info');
// });

Route::post('/traveller-info', 'TravellerController@create')->name('traveller-info');
Route::post('/traveller-create', 'TravellerController@store')->name('traveller-create');

Route::post('/payment/response', 'PaymentController@create')->name('payment-response');
Route::post('/payment/backend', 'PaymentController@store')->name('payment-backend');
