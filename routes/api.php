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

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});
Route::apiResource('thanhpho', 'Api\ThanhphoController')->only(['index', 'show']);
Route::apiResource('nganhnghe', 'Api\NganhngheController')->only(['index', 'show']);
Route::apiResource('timkiemviec', 'Api\TimkiemviecController')->only(['index', 'show']);
Route::apiResource('mucluong', 'Api\MucluongController')->only(['index', 'show']);
Route::apiResource('kinhnghiem', 'Api\KinhnghiemController')->only(['index', 'show']);
Route::apiResource('kynang', 'Api\KynangController')->only(['index', 'show']);
Route::apiResource('trinhdo', 'Api\TrinhdoController')->only(['index', 'show']);
Route::apiResource('hinhthuclamviec', 'Api\HinhthuclamviecController')->only(['index', 'show']);

