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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sample01', [\App\Http\Controllers\Sample01Controller::class, 'index']);

Route::get('/sample02', [\App\Http\Controllers\Sample02Controller::class, 'index']);
Route::post('/sample02', [\App\Http\Controllers\Sample02Controller::class, 'postCheck']);
