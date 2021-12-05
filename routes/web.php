<?php

use App\Http\Controllers\TimeslotController;
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

//Route::resource('timeslot', TimeslotController::class);
Route::get('/index', 'App\Http\Controllers\TimeslotController@index');
Route::post('/create', 'App\Http\Controllers\TimeslotController@create');
Route::get('edit/getTimeslot/{id}', 'App\Http\Controllers\TimeslotController@getTimeslot');
Route::post('edit/update/{id}', 'App\Http\Controllers\TimeslotController@update');
Route::post('timeslot/delete/{id}', 'App\Http\Controllers\TimeslotController@softDelete');

Route::get('/{any?}', function () {
    return view('welcome');
})->where('any', '.*');

