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

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
	
Route::get('/home', [App\Http\Controllers\TeacherController::class, 'index'])->name('home');

Route::get('/teachers/create',['as'=>'teachers.create','uses'=>'TeacherController@create']);

Route::post('/teachers/store',['as'=>'teachers.store','uses'=>'TeacherController@store']);

Route::get('/teachers/export.{type}',['as'=>'teachers.export','uses'=>'TeacherController@csv_download']);
	
});


