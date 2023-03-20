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
    $config = [
        'appName' => config('app.name'),
        'apiUrl' => config('app.url') . '/api',
    ];
    return view('welcome')->with(['config' => $config]);
});
