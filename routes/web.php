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
	return view('index');
});
Route::get('/index', function () {
	return view('index');
});
Route::get('/test', 'UngvienController@test');
//Route::get('/timkiemviec','Api\TimkiemviecController@index');
Route::get('/timkiemviec','UngvienController@index');
Route::get('/tintuyendung/{id}','UngvienController@getTintuyendung');
Route::post('/ungviendangnhap', 'UngvienController@postDangnhap');
Route::post('/ungviendangky','UngvienController@postDangky');

Route::get('/ungvien/quanlytaikhoan', 'UngvienController@getQuanlytaikhoan')->middleware('login_ungvien');
Route::post('ungvien/quanlytaikhoan/postThongtincanhan', 'UngvienController@postThongtincanhan')->middleware('login_ungvien');
Route::get('/ungvien/thoat', 'UngvienController@getThoat')->middleware('login_ungvien');
Route::get('/ungvien/luuvieclam/{id}', 'UngvienController@getLuuvieclam')->middleware('login_ungvien');
Route::get('/ungvien/tintuyendungdanop', 'UngvienController@getTintuyendungdanop')->middleware('login_ungvien');

