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
Route::get('/danh-sach-tin-nha-tuyen-dung/{id}.html','UngvienController@getNhatuyendung');

Route::post('/ungviendangnhap', 'UngvienController@postDangnhap');
Route::post('/ungviendangky', 'UngvienController@postDangky');


Route::get('/ungvien/quanlytaikhoan', 'UngvienController@getQuanlytaikhoan')->middleware('login_ungvien');
Route::post('ungvien/quanlytaikhoan/postThongtincanhan', 'UngvienController@postThongtincanhan')->middleware('login_ungvien');
Route::get('/ungvien/thoat', 'UngvienController@getThoat')->middleware('login_ungvien');

Route::get('/ung-vien/luu-viec-lam/{id}', 'UngvienController@getLuuvieclam')->middleware('login_ungvien');
Route::get('/ung-vien/nop-ho-so/{id}', 'UngvienController@getNophoso')->middleware('login_ungvien');

Route::get('/ungvien/tintuyendungdanop', 'UngvienController@getTintuyendungdanop')->middleware('login_ungvien');

Route::get('/ung-vien/tin-tuyen-dung-luu', 'UngvienController@getTintuyendungluu')->middleware('login_ungvien');

Route::get('/ung-vien/ho-so', 'UngvienController@getHoso')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so', 'UngvienController@postHoso')->middleware('login_ungvien');

Route::post('/ung-vien/khac', 'UngvienController@postKhac')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/kinh-nghiem-lam-viec-sua/{id}
	', 'UngvienController@postKinhnghiemlamviecsua')->middleware('login_ungvien');
Route::post('ung-vien/ho-so/kinh-nghiem-lam-viec-moi
	', 'UngvienController@postKinhnghiemlamviec')->middleware('login_ungvien');
Route::get('ung-vien/ho-so/kinh-nghiem-lam-viec-xoa/{id}
	', 'UngvienController@getKinhnghiemlamviecxoa')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-tin-hoc', 'UngvienController@postTrinhdotinhoc')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-ngoai-ngu-sua/{id_ngoaingu}', 'UngvienController@postTrinhdongoaingusua')->middleware('login_ungvien');

Route::post('/ung-vien/ho-so/trinh-do-ngoai-ngu-moi', 'UngvienController@postTrinhdongoaingumoi')->middleware('login_ungvien');
Route::get('/ung-vien/ho-so/trinh-do-ngoai-ngu-xoa/{id_ngoaingu}', 'UngvienController@getTrinhdongoainguxoa')->middleware('login_ungvien');
Route::get('/ung-vien/ho-so/trinh-do-bang-cap-xoa/{id}', 'UngvienController@getTrinhdobangcapxoa')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/trinh-do-bang-cap-moi', 'UngvienController@postTrinhdobangcapmoi')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/trinh-do-bang-cap-sua/{id}', 'UngvienController@postTrinhdobangcapsua')->middleware('login_ungvien');

Route::get('/ung-vien/ho-so/nguoi-tham-khao-xoa/{id}', 'UngvienController@getNguoithamkhaoxoa')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/nguoi-tham-khao-moi', 'UngvienController@postNguoithamkhaomoi')->middleware('login_ungvien');
Route::post('/ung-vien/ho-so/nguoi-tham-khao-sua/{id}', 'UngvienController@postNguoithamkhaosua')->middleware('login_ungvien');







Route::get('/nhatuyendung','NhatuyendungController@getDangky');
Route::post('/nhatuyendung','NhatuyendungController@postDangky');
Route::post('/nhatuyendungdangnhap','NhatuyendungController@postDangnhap');

Route::get('/nhatuyendung/thoat','NhatuyendungController@getThoat')->middleware('login_nhatuyendung');
Route::get('/nhatuyendung/quanlytaikhoan','NhatuyendungController@getQuanlytaikhoan')->middleware('login_nhatuyendung');
Route::get('/nhatuyendung/tindadang','NhatuyendungController@getTindadang')->middleware('login_nhatuyendung');
Route::get('/nhatuyendung/dangtintuyendung','NhatuyendungController@getDangtintuyendung')->middleware('login_nhatuyendung');
Route::post('/nhatuyendung/dangtintuyendung','NhatuyendungController@postDangtintuyendung')->middleware('login_nhatuyendung');





/*Route::fallback(function(){
	return redirect('index');
});*/