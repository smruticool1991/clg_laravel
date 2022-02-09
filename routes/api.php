<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\SemesterController;
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
Route::apiResource('/mark', 'MarkController');
Route::apiResource('/semester', 'SemesterController');
Route::apiResource('/mark','MarkController');
Route::get('/result', 'MarkController@some')->name('mark.some');
Route::get('/semester/manual', 'MarkController@manual');
Route::apiResource('/hostel', 'HostelController');
Route::get('/hostel/{id}/edit', 'HostelController@edit')->name('hostel.edit');
Route::apiResource('/hostelname','HostelNameController');
Route::apiResource('/session', 'SessionController');
Route::apiResource('/sms', 'SmsController');
Route::apiResource('/book', 'BookDetailController');
Route::get('/result/existsemester/{id}', 'MarkController@existSemester')->name('mark.existSemester');
// Route::apiResource('/session', 'SessionController');
Route::get('/com-sub', 'CommerceSubjectController@index');
Route::get('/student/view', 'StudentController@index');
Route::get('/update/{id}', 'StudentController@show');
Route::put('update-store/{id}','StudentController@update');
Route::get('student/delete', 'StudentController@destroy');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user(); 
});
// Route::group(['middleware' => 'key'], function(){
// 	Route::get('/session','SessionController@index');
// });
// Route::group(['middleware'=>'auth:api'],function(){
// 	Route::get('./session','SessionController@index');
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
