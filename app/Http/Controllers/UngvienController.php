<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuyendung;
use App\ungvien_thanhpho;
use App\ungvien_kynang;
use App\ungvien_luu_tin;
use App\kinhnghiemlamviec;;
use App\ungvien;
use App\trinhdotinhoc;
use App\nhatuyendung;
use App\ungvien_nop_tin;
use App\ungvien_ngoaingu;
use App\trinhdobangcap;
use App\nguoithamkhao;
use Auth;
class UngvienController extends Controller
{

public function getNguoithamkhaoxoa($id)
{
  $nguoithamkhao=nguoithamkhao::where('id',$id)->where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();
  $nguoithamkhao[0]->delete();
   return redirect()->back()->with('alert','Xóa thành công.');
}

public function postNguoithamkhaomoi(Request $request)
{
 $nguoithamkhao=new nguoithamkhao;
 $nguoithamkhao->hoten=$request->hoten;
 $nguoithamkhao->congty=$request->congty;
 $nguoithamkhao->sodienthoai=$request->sodienthoai;
 $nguoithamkhao->chucvu=$request->chucvu;
 $nguoithamkhao->id_ungvien=Auth::guard('ungvien')->user()->id;
 $nguoithamkhao->save();
 return redirect()->back()->with('alert','Thêm thành công.');
}
public function postNguoithamkhaosua(Request $request,$id)
{
  $nguoithamkhao=nguoithamkhao::where('id',$id)->where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();
  $nguoithamkhao[0]->hoten=$request->hoten;
 $nguoithamkhao[0]->congty=$request->congty;
 $nguoithamkhao[0]->sodienthoai=$request->sodienthoai;
 $nguoithamkhao[0]->chucvu=$request->chucvu;
 $nguoithamkhao[0]->id_ungvien=Auth::guard('ungvien')->user()->id;
 $nguoithamkhao[0]->save();
 return redirect()->back()->with('alert','Sửa thành công.');
}
  public function getTrinhdobangcapxoa($id)
  {
    $trinhdobangcap=trinhdobangcap::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id',$id)->get();
    $trinhdobangcap[0]->delete();
    return redirect()->back()->with('alert','Xóa thành công.');
  }

  public function postTrinhdobangcapmoi(Request $request)
  {
   $trinhdobangcap=new trinhdobangcap;
   $trinhdobangcap->tenbangcap=$request->tenbangcap;
   $trinhdobangcap->truongdaotao=$request->truongdaotao;
   $trinhdobangcap->chuyennganh=$request->chuyennganh;
   $trinhdobangcap->id_ungvien=Auth::guard('ungvien')->user()->id;
   $trinhdobangcap->thoigiantotnghiep=date($request->thoigiantotnghiep.'-01');

   $trinhdobangcap->save();
      return redirect()->back()->with('alert','Thêm thành công.');
  // $trinhdobangcap->anh=$request->anh;
 }

 public function postTrinhdobangcapsua(Request $request,$id)
 {
  $trinhdobangcap=trinhdobangcap::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id',$id)->get();
   $trinhdobangcap[0]->tenbangcap=$request->tenbangcap;
   $trinhdobangcap[0]->truongdaotao=$request->truongdaotao;
   $trinhdobangcap[0]->chuyennganh=$request->chuyennganh;
   $trinhdobangcap[0]->id_ungvien=Auth::guard('ungvien')->user()->id;
   $trinhdobangcap[0]->thoigiantotnghiep=date($request->thoigiantotnghiep.'-01');

   $trinhdobangcap[0]->save();
      return redirect()->back()->with('alert','Thêm thành công.');
 }

 public function getTrinhdongoainguxoa($id_ngoaingu)
 {
  $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->delete();

  return redirect()->back()->with('alert','Xóa thành công.');
}


public function postTrinhdongoaingumoi(Request $request)
{

  if(count($ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$request->ngoaingu)->get())==0)

    { $ungvien_ngoaingu=new ungvien_ngoaingu;

     $ungvien_ngoaingu->trinhdonghe=$request->trinhdonghe;
     $ungvien_ngoaingu->trinhdonoi=$request->trinhdonoi;
     $ungvien_ngoaingu->trinhdodoc=$request->trinhdodoc;
     $ungvien_ngoaingu->trinhdoviet=$request->trinhdoviet;
     $ungvien_ngoaingu->id_ngoaingu=$request->ngoaingu;
     $ungvien_ngoaingu->tenngoaingukhac=$request->ngoaingu;
     $ungvien_ngoaingu->id_ungvien=Auth::guard('ungvien')->user()->id;
     $ungvien_ngoaingu->save();
     return redirect()->back()->with('alert','Thêm thành công.');
   }

   return redirect()->back()->with('alert','Đã tồn tại.');
 }
 public function postTrinhdongoaingusua(Request $request,$id_ngoaingu)
 {
 

if($request->ngoaingu==$id_ngoaingu)
 {
  $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->update(['trinhdonghe'=>$request->trinhdonghe,'trinhdonoi'=>$request->trinhdonoi,'trinhdodoc'=>$request->trinhdodoc,'trinhdoviet'=>$request->trinhdoviet]);

   return redirect()->back()->with('alert','Sửa thành công.');}  
   


  if(count($ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$request->ngoaingu)->get())==1)

   
    return redirect()->back()->with('alert','Đã tồn tại.');

 $ungvien_ngoaingu=ungvien_ngoaingu::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_ngoaingu',$id_ngoaingu)->update(['trinhdonghe'=>$request->trinhdonghe,'trinhdonoi'=>$request->trinhdonoi,'trinhdodoc'=>$request->trinhdodoc,'trinhdoviet'=>$request->trinhdoviet,'id_ngoaingu'=>$request->ngoaingu]);

   return redirect()->back()->with('alert','Sửa thành công.');
}
public function postTrinhdotinhoc(Request $request)
{
  $trinhdotinhoc=trinhdotinhoc::find(Auth::guard('ungvien')->user()->trinhdotinhoc[0]->id);

  $trinhdotinhoc->msword=$request->msword;
  $trinhdotinhoc->mspp=$request->mspp;
  $trinhdotinhoc->msoutlook=$request->msoutlook;
  $trinhdotinhoc->msexcel=$request->msexcel;
  $trinhdotinhoc->phanmemkhac=$request->phanmemkhac;

  $trinhdotinhoc->save();

  return redirect()->back();
}


public function getLuuvieclam($id)
{
  $timkiem=ungvien_luu_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_tintuyendung',$id)->get();

  if(count($timkiem)>0)
  {

  }
  else {
   $ungvien_luu_tin=new ungvien_luu_tin;
   $ungvien_luu_tin->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_luu_tin->id_tintuyendung=$id;
   $ungvien_luu_tin->save();
 }


 return redirect()->back()->with('success','Đã lưu tin tuyển dụng');
}






public function getKinhnghiemlamviecxoa($id){
  $kinhnghiemlamviec=kinhnghiemlamviec::find($id)->delete();
  return redirect()->back();
}
public function postKinhnghiemlamviec(Request $request){
  $kinhnghiemlamviec=new kinhnghiemlamviec;
  $kinhnghiemlamviec->tencongty=$request->tencongty;
  $kinhnghiemlamviec->chucdanh=$request->chucdanh;
  $kinhnghiemlamviec->thoigianbatdau=date($request->thoigianbatdau.'-01');
  $kinhnghiemlamviec->thoigianketthuc=date($request->thoigianketthuc.'-01');
  $kinhnghiemlamviec->congviechientai=$request->congviechientai;
  $kinhnghiemlamviec->mucluong=$request->mucluong;
  $kinhnghiemlamviec->motacongviec=$request->motacongviec;
  $kinhnghiemlamviec->thanhtich=$request->thanhtich;
  $kinhnghiemlamviec->id_ungvien=Auth::guard('ungvien')->user()->id;
  $kinhnghiemlamviec->save();
  return redirect()->back();

}

public function postKinhnghiemlamviecsua(Request $request,$id){

 $kinhnghiemlamviec=kinhnghiemlamviec::find($id);
 $kinhnghiemlamviec->tencongty=$request->tencongty;
 $kinhnghiemlamviec->chucdanh=$request->chucdanh;
 $kinhnghiemlamviec->thoigianbatdau=date($request->thoigianbatdau.'-01');
 $kinhnghiemlamviec->thoigianketthuc=date($request->thoigianketthuc.'-01');
 $kinhnghiemlamviec->congviechientai=$request->congviechientai;
 $kinhnghiemlamviec->mucluong=$request->mucluong;
 $kinhnghiemlamviec->motacongviec=$request->motacongviec;
 $kinhnghiemlamviec->thanhtich=$request->thanhtich;
 $kinhnghiemlamviec->save();

 return redirect()->back();



}
public function postKhac(Request $request){

 $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);

 $ungvien->muctieu=$request->muctieu;
 $ungvien->kynangsotruong=$request->kynangsotruong;

 $ungvien->sothich=$request->sothich;
 $ungvien->save();
 return redirect()->back();
}

public function postHoso(Request $request){

  $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);

  $ungvien->vitrimongmuon=$request->vitrimongmuon;
  $ungvien->id_nganhnghe=$request->nganhnghe;

  $ungvien->id_capbac=$request->capbac;
  $ungvien->id_hinhthuclamviec=$request->hinhthuclamviec;
  $ungvien->id_kinhnghiem=$request->kinhnghiem;
  $ungvien->id_trinhdo=$request->trinhdo;

  $ungvien->save();
  $ungvien_thanhpho=ungvien_thanhpho::where('id_ungvien',Auth::guard('ungvien')->user()->id)->delete();
  foreach (  $request->thanhpho as $key => $value) {

   $ungvien_thanhpho=new ungvien_thanhpho;
   $ungvien_thanhpho->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_thanhpho->id_thanhpho=$value;
   $ungvien_thanhpho->save();
 }
 $ungvien_kynang=ungvien_kynang::where('id_ungvien',Auth::guard('ungvien')->user()->id)->delete();
 foreach (  $request->kynang as $key => $value) {

   $ungvien_kynang=new ungvien_kynang;
   $ungvien_kynang->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_kynang->id_kynang=$value;
   $ungvien_kynang->save();
 }
 return redirect()->back();

}
public function getHoso(){

  return view('ungvien.hoso');
}
public function getThoat(){
  Auth::guard('ungvien')->logout();
  return redirect('timkiemviec');
}

public function getNhatuyendung($id)
{

  $data=nhatuyendung::find($id);
  return view('ungvien.danhsachtinnhatuyendung',['data'=>$data]);

}

public function getNophoso($id){

  $timkiem=ungvien_nop_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->where('id_tintuyendung',$id)->get();

  if(count($timkiem)>0)
  {

  }
  else {
   $ungvien_nop_tin=new ungvien_nop_tin;
   $ungvien_nop_tin->id_ungvien=Auth::guard('ungvien')->user()->id;
   $ungvien_nop_tin->id_tintuyendung=$id;
   $ungvien_nop_tin->save();
 }


 return redirect()->back()->with('success','Đã nộp tin tuyển dụng');

}
public function postThongtincanhan(Request $request)
{


 $this->validate($request,[
  'hoten'=>'required|max:255',
  'ngaysinh'=>'required',
  'diachi'=>'required|max:255',
  'thanhpho'=>'required',

],[
  'hoten.required'=>'Tên không được để trống.',
  'hoten.max'=>'Tên tối đa 255 ký tự.',
  'diachi.required'=>'Địa chỉ không được để trống.',
  'diachi.max'=>'Địa chỉ tối đa 255 ký tự.',

]);

 $ungvien=ungvien::find(Auth::guard('ungvien')->user()->id);
 echo $ungvien->hoten=$request->hoten;
 echo $ungvien->ngaysinh=$request->ngaysinh;
 echo $ungvien->diachi=$request->diachi;
 echo $ungvien->id_thanhpho=$request->thanhpho;
 echo $ungvien->gioitinh=$request->gioitinh;
 echo $ungvien->tinhtranghonnhan=$request->tinhtranghonnhan;



 $ungvien->save();

 return redirect('ungvien/quanlytaikhoan');

}


public function getTintuyendungdanop()
{

  $dstintuyendung=ungvien_nop_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

  return  view('ungvien.tintuyendungdanop',['data'=>$dstintuyendung]);

}

public function getTintuyendungluu()
{

  $dstintuyendung=ungvien_luu_tin::where('id_ungvien',Auth::guard('ungvien')->user()->id)->get();

  return  view('ungvien.tintuyendungluu',['data'=>$dstintuyendung]);

}

public function postDangnhap(Request $request)
{


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

if (Auth::guard('ungvien')->attempt($arr)) {

  return redirect()->back();
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
} else {

  var_dump($arr);
  var_dump(Auth::guard('ungvien')->attempt($arr));
  dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
}
}

public function postDangky(Request $request)
{


  $this->validate($request,[
    'hoten'=>'required|max:255',
    'email'=>'required|max:255|email|unique:ungvien,email',
    'sodienthoai'=>'required|max:10|min:10',
    'matkhau1'=>'required|max:255|min:8',
    'matkhau2'=>'required|same:matkhau1',

  ],[
    'hoten.required'=>'Tên không được để trống.',
    'hoten.max'=>'Tên tối đa 255 ký tự.',
    'email.required'=>'Email không được để trống.',
    'email.max'=>'Email tối đa 255 ký tự.',
    'email.email'=>'Email không hợp lệ.',
    'email.unique'=>'Đã tồn tại email',
    'sodienthoai.required'=>'Số điện thoại không được để trống.',
    'sodienthoai.max'=>'Số điện thoại không hợp lệ.',
    'sodienthoai.min'=>'Số điện thoại không hợp lệ.',
    'matkhau1.max'=>'Mật khẩu không hợp lệ.',
    'matkhau1.min'=>'Mật khẩu không hợp lệ.',
    'matkhau1.required'=>'Mật khẩu không hợp lệ.',
    'matkhau2.same'=>'Mật khẩu không khớp.',


  ]);

  $ungvien=new ungvien;
  $ungvien->hoten=$request->hoten;
  $ungvien->matkhau=bcrypt($request->matkhau2);
  $ungvien->sodienthoai=$request->sodienthoai;
  $ungvien->email=$request->email;
  $ungvien->save();

  $trinhdotinhoc=new trinhdotinhoc;
  $trinhdotinhoc->id_ungvien=$ungvien->id;
  $trinhdotinhoc->save();

  $arr = [
    'email' => $request->email,
    'password' => $request->matkhau2,
  ];
  if (Auth::guard('ungvien')->attempt($arr)) {

   return redirect()->back();
            //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
 }



}

public function getQuanlytaikhoan(){

 return view('ungvien.quanlytaikhoan');
}
public function index()
{
 $timkiem="";  
 $kq=[];
 $tintuyendung=tintuyendung::query();
 if(isset($_GET['nganhnghe']))
 {
  $tintuyendung->when($_GET['nganhnghe']!="",function($q)
  {
   return $q->where('id_nganhnghe','=',$_GET['nganhnghe']);
 });
}
if(isset($_GET['hinhthuclamviec']))
{
  $tintuyendung->when($_GET['hinhthuclamviec']!="",function($q)
  {
   return $q->where('id_hinhthuclamviec','=',$_GET['hinhthuclamviec']);
 });
}

if(isset($_GET['tencongviec']))
{
  $tintuyendung->when($_GET['tencongviec']!="",function($q)
  {
   return $q->where('tieudetuyendung','like','%'.$_GET['tencongviec'].'%');
 });
}

if(isset($_GET['trinhdo']))
{
  $tintuyendung->when($_GET['trinhdo']!="",function($q)
  {
   return $q->where('id_trinhdo',$_GET['trinhdo']);
 });
}



if (isset($_GET['mucluong'])) 
{
  $dsml=[];

  foreach ($_GET['mucluong'] as $key => $value) 
  {

   array_push($dsml,$value);
 }	$tintuyendung->whereIn('id_mucluong',$dsml);		
}

if (isset($_GET['kinhnghiem'])) 
{
  $dskn=[];

  foreach ($_GET['kinhnghiem'] as $key => $value) 
  {

   array_push($dskn,$value);
 }	$tintuyendung->whereIn('id_kinhnghiem',$dskn);
}

if (!isset($_GET['nganhnghe'])&&!isset($_GET['tencongviec'])&&!isset($_GET['trinhdo'])&&!isset($_GET['thanhpho'])&&!isset($_GET['kynang'])&&!isset($_GET['kinhnghiem'])&&!isset($_GET['hinhthuclamviec'])) 
{
  return view('ungvien.timkiemviec');
}
elseif($tintuyendung==tintuyendung::query())
{		
  $tintuyendung=tintuyendung::all();
}		
else
{
  $tintuyendung=$tintuyendung->get();
}

if (isset($_GET['thanhpho']))
{
  if($_GET['thanhpho']!="")
  {		
   foreach ($tintuyendung as $key => $value)
   { 
    $x=$value->dsthanhpho;
    foreach ($x as $key1 => $value1) 
    {
     if($value1['id_thanhpho']==$_GET['thanhpho'])
     { 
      array_push($kq,$value);
      break;
    }
  }
}
return view('ungvien.timkiemviec',['data'=>$kq]);
}
}

$kq=$tintuyendung;

return view('ungvien.timkiemviec',['data'=>$kq]);


}

public function getTintuyendung($id)
{	
 $tintuyendung=tintuyendung::find($id);


 return view('ungvien.tintuyendung',['data'=>$tintuyendung]);
}
public function test()
{
 return view('ungvien.test');
}
}
