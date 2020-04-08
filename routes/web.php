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

Route::get('/', 'CovidController@index');
Route::post('/country', 'CovidController@country');
Route::get('/corona', 'CovidController@corona');
Route::get('/statistics', 'CovidController@statistics');
Route::get('/global', 'CovidController@global');
Route::post('/individual', 'CovidController@individual');
Route::get('/borrar-cache', function() {
Artisan::call('cache:clear');
Artisan::call('config:clear');
Artisan::call('config:cache');
Artisan::call('view:clear');
return "Borrado!";
});