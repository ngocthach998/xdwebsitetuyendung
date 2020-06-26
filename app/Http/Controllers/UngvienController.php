<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tintuyendung;
class UngvienController extends Controller
{
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

	public function tintuyendung($id)
	{	
		$tintuyendung=tintuyendung::find($id);


		return view('ungvien.tintuyendung',['data'=>$tintuyendung]);
	}
	public function test()
	{
		return view('ungvien.test');
	}
}
