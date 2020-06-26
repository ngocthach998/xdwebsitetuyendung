<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tintuyendung;
use App\tintuyendung_thanhpho;

class TimkiemviecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timkiem="";

   /*  echo $_GET['tencongviec'];
     echo $_GET['nganhnghe'];
     echo $_GET['thanhpho'];*/
     $kq=[];
     $tintuyendung=tintuyendung::query();
   //  $tintuyendung=tintuyendung::when($_GET['nganhnghe']!="",where('id_nganhnghe',$_GET['nganhnghe']));
     $tintuyendung->when($_GET['nganhnghe']!="",function($q){
        return $q->where('id_nganhnghe','=',$_GET['nganhnghe']);
    });
     if($_GET['thanhpho']!=""){
       $tintuyendung=$tintuyendung->get();
       foreach ($tintuyendung as $key => $value) { 
     
        $x=  $value->thanhpho;
        foreach ($x as $key1 => $value1) {
            if($value1['id_thanhpho']==$_GET['thanhpho'])
             { array_push($kq,$value);

              break;}
     }
 }
 return response()->json($kq);
}
 return response()->json($tintuyendung->get());
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
