<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\nhatuyendung;
use App\tintuyendung;
use App\tintuyendung_kynang;
use App\tintuyendung_thanhpho;

class NhatuyendungController extends Controller
{
	public function getDangtintuyendung(){
		return view('nhatuyendung.dangtintuyendung');
	}
	public function postDangtintuyendung(Request $request){


		$tintuyendung=new tintuyendung;
		$tintuyendung->tieudetuyendung=$request->tieudetuyendung;
		$tintuyendung->soluongcantuyen=$request->soluongcantuyen;
		$tintuyendung->dotuoi=$request->dotuoi;
		$tintuyendung->gioitinh=$request->gioitinh;
		$tintuyendung->id_kinhnghiem=$request->kinhnghiem;
		$tintuyendung->motacongviec=$request->motacongviec;
		$tintuyendung->quyenloi=$request->quyenloi;
		$tintuyendung->yeucaukhac=$request->yeucaukhac;
		$tintuyendung->hannophoso=$request->hannophoso;
		$tintuyendung->id_capbac=$request->capbac;
		$tintuyendung->id_nganhnghe=$request->nganhnghe;
		$tintuyendung->id_hinhthuclamviec=$request->hinhthuclamviec;
		$tintuyendung->id_mucluong=$request->mucluong;
		$tintuyendung->id_trinhdo=$request->trinhdo;
		$tintuyendung->id_nhatuyendung=	Auth::guard('nhatuyendung')->user()->id;
		$tintuyendung->save();

		foreach ($request->kynang as $key => $value) {
			$tintuyendung_kynang=new tintuyendung_kynang;
			$tintuyendung_kynang->id_tintuyendung=$tintuyendung->id;
			$tintuyendung_kynang->id_kynang=$value;
			$tintuyendung_kynang->save();
		}


		foreach ($request->thanhpho as $key => $value) {
			$tintuyendung_thanhpho=new tintuyendung_thanhpho;
			$tintuyendung_thanhpho->id_tintuyendung=$tintuyendung->id;
			$tintuyendung_thanhpho->id_thanhpho=$value;
			$tintuyendung_thanhpho->save();
		}

		dd('Thanh cong');

/*foreach ($request->kynang as $key => $value) {
	
	echo $value;
}
foreach ($request->thanhpho as $key => $value) {
	
	echo $value;
}
		var_dump($request->kynang);
		var_dump($request->thanhpho);*/

	}
	public function getThoat(){
		Auth::guard('nhatuyendung')->logout();
		return redirect('nhatuyendung');
	}
	public function getDangky(){
		if(Auth::guard('nhatuyendung')->check())
			return redirect('nhatuyendung/quanlytaikhoan');
		return view('nhatuyendung.dangky');

	}

	public function getTindadang(){
		return view('nhatuyendung.tindadang');
	}
	public function postDangky(Request $request){

		$this->validate($request,[
			'email'=>'required|max:255|email|unique:nhatuyendung,email',
			'matkhau1'=>'required|max:255|min:8',
			'matkhau2'=>'required|max:255|min:8|same:matkhau1',
			'tencongty'=>'required',
			'diachicongty'=>'required|max:255',
			'thanhpho'=>'required',
			'sodienthoai'=>'required|max:255',
			'gioithieu'=>'required|min:10|max:1000',
			'quymo'=>'required',
			'websitecongty'=>'max:255',
			'tennguoilienhe'=>'required|max:255',
			'diachilienhe'=>'required|max:255',
			'sodienthoailienhe'=>'required',
			'emaillienhe'=>'required|max:255|email',
			
		],[
			

		]);
		$nhatuyendung=new nhatuyendung;
		$nhatuyendung->email=$request->email;
		$nhatuyendung->matkhau=bcrypt($request->matkhau2);
		$nhatuyendung->tencongty=$request->tencongty;
		$nhatuyendung->diachicongty=$request->diachicongty;
		$nhatuyendung->id_thanhpho=$request->thanhpho;
		$nhatuyendung->sodienthoai=$request->sodienthoai;
		$nhatuyendung->id_quymonhansu=$request->quymo;
		$nhatuyendung->websitecongty=$request->websitecongty;
		$nhatuyendung->tennguoilienhe=$request->tennguoilienhe;
		$nhatuyendung->diachilienhe=$request->diachilienhe;
		$nhatuyendung->sodienthoailienhe=$request->sodienthoailienhe;
		$nhatuyendung->emaillienhe=$request->emaillienhe;
		$nhatuyendung->logo=$request->logo;
		$nhatuyendung->gioithieu=$request->gioithieu;
		$nhatuyendung->save();

		$arr = [
			'email' => $request->email,
			'password' => $request->matkhau2,
		];
		if (Auth::guard('nhatuyendung')->attempt($arr)) {

			return redirect('nhatuyendung/quanlytaikhoan');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
		}


		
	}
	public function getQuanlytaikhoan()
	{
		
		return view('nhatuyendung.quanlytaikhoan');

	}
	public function postDangnhap(Request $request){
		$arr = [
			'email' => $request->email,
			'password' => $request->password,
		];


		if ($request->remember == trans('remember.Remember Me')) {
			$remember = true;
		} else {
			$remember = false;
		}
        //kiểm tra trường remember có được chọn hay không

		if (Auth::guard('nhatuyendung')->attempt($arr)) {

			return redirect('nhatuyendung/quanlytaikhoan');
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
		} else {

			return redirect()->back();
			var_dump($arr);
			var_dump(Auth::guard('nhatuyendung')->attempt($arr));
			dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
		}
	}
}
