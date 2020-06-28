<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuyendung;
use App\ungvien;
use App\ungvien_nop_tin;
use Auth;
class UngvienController extends Controller
{
	public function getThoat(){
		Auth::guard('ungvien')->logout();
		return redirect('timkiemviec');
	}

public function getLuuvieclam($id){

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

      dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
  }
}

public function postDangky(Request $request)
{

//var_dump($request);
    $matkhau=$request->matkhau1;
    $this->validate($request,[
        'hoten'=>'required|max:255',
        'email'=>'required|max:255|email',
        'sodienthoai'=>'required|max:10|min:10',
        'matkhau1'=>'required|max:255|min:8',
        'matkhau2'=>'required|max:255',

    ],[
        'hoten.required'=>'Tên không được để trống.',
        'hoten.max'=>'Tên tối đa 255 ký tự.',
        'email.required'=>'Email không được để trống.',
        'email.max'=>'Email tối đa 255 ký tự.',
        'email.email'=>'Email không hợp lệ.',
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
    $ungvien->password=bcrypt($request->matkhau2);
    $ungvien->sodienthoai=$request->sodienthoai;
    $ungvien->email=$request->email;
    $ungvien->save();

    $arr = [
      'email' => $request->email,
      'password' => $request->matkhau2,
  ];
  if (Auth::guard('ungvien')->attempt($arr)) {

      return redirect('ungvien/quanlytaikhoan');
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
