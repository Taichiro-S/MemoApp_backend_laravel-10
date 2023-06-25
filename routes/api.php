<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

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

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/user', function (Request $request) {
        Log::channel('authUser')->info('Authenticated user', ['user' => Auth::user()]);
        return $request->user();
    });
    // api routes go here
    Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
    Route::post('/task/create', 'App\Http\Controllers\TaskController@store');
    Route::post('/task/{task_id}/update', 'App\Http\Controllers\TaskController@update');
    Route::post('/task/{task_id}/delete', 'App\Http\Controllers\TaskController@destroy');

});