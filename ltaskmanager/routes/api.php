<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\HomeController;

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

Route::apiResource('projects', ProjectController::class);
Route::get('/search/{searchBy}/{searchtext}' , [ProjectController::class,'search']);
//Route::get('/projects/{$searchBy}/{$searchtext}', 'ProjectController@projectSearch');

Route::POST('login' , [HomeController::class,'login']);
Route::get('authenticateuserlogin' , [HomeController::class,'index'])->middleware('auth:api');
//Route::post('login', 'App\Http\Controllers\Api\HomeController@login');
//Route::get('users', 'App\Http\Controllers\Api\HomeController@index')->middleware('auth:api');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
