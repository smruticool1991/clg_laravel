<?php

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
Route::post('/student/add', 'StudentController@store');
Route::post('/student/add_excel', 'StudentController@store_excel');
Route::get('/student/a', 'StudentController@abc');
Route::get('/session', 'SessionController@index');
Route::get('/com-sub', 'CommerceSubjectController@index');
Route::get('/student/view', 'StudentController@index');
Route::get('/update/{id}', 'StudentController@show');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
