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
// Route::apiResource('/session', 'SessionController');
Route::get('/com-sub', 'CommerceSubjectController@index');
Route::get('/student/view', 'StudentController@index');
Route::get('/update/{id}', 'StudentController@show');
Route::put('update-store/{id}','StudentController@update');
Route::get('student/delete', 'StudentController@destroy');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); 
});
Route::group(['middleware' => 'key'], function(){
	Route::get('/session','SessionController@index');
});
// Route::group(['middleware'=>'auth:api'],function(){
// 	Route::get('./session','SessionController@index');
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
