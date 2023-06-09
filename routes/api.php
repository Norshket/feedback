<?php

use App\Http\Controllers\Feedbacks\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('/feedback')->middleware('throttle:60,1')->group( function () {
    Route::post('/send', [FeedbackController::class, 'send']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
