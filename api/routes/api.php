<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\BlogController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::resource('blogs', BlogController::class);
//Route::resource('api/seminars', SeminarController::class);
//Route::post('api/blogs', 'BlogController@store');
//Route::post('api/blogs/{id}', 'BlogController@update');
Route::resource('api/seminars', SeminarController)->names('seminars');
Route::resource('api/blogs', 'BlogController')->names('blogs');

//Route::post('api/seminars/{id}', 'SeminarController@update');

//Route::post('api/seminars', 'SeminarController@store');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
