<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuyendung extends Model
{
	protected $table="tintuyendung";
	public $timestamps=false;
	public function thanhpho()
	{
		//return $this->hasMany('App\tintuyendung_thanhpho','id_tintuyendung');
		return $this->belongsToMany('App\thanhpho','tintuyendung_thanhpho','id_tintuyendung','id_thanhpho');
		//return $this->belongsToMany('App\thanhpho');
	}
	public function dsthanhpho()
	{
		return $this->hasMany('App\tintuyendung_thanhpho','id_tintuyendung');
	}
	public function ungvien_nop_tin()
	{
		return $this->hasMany('App\ungvien_nop_tin','id_tintuyendung');
	}
	public function kynang()
	{
		
		return $this->belongsToMany('App\kynang','tintuyendung_kynang','id_tintuyendung','id_kynang');
		
	}
	public function nhatuyendung()
	{
		return $this->belongsTo('App\nhatuyendung','id_nhatuyendung');
	}
	public function mucluong()
	{
		return $this->belongsTo('App\mucluong','id_mucluong');
	}
	public function kinhnghiem()
	{
		return $this->belongsTo('App\kinhnghiem','id_kinhnghiem');
	}
	public function capbac()
	{
		return $this->belongsTo('App\capbac','id_capbac');
	}
	public function hinhthuclamviec()
	{
		return $this->belongsTo('App\hinhthuclamviec','id_hinhthuclamviec');
	}
	public function trinhdo()
	{
		return $this->belongsTo('App\trinhdo','id_trinhdo');
	}
	public function nganhnghe()
	{
		return $this->belongsTo('App\nganhnghe','id_nganhnghe');
	}
}
