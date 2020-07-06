<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ungvien_luu_tin extends Model
{
     protected $table="ungvien_luu_tin";
    public $timestamps=false;//

	public function ungvien()
	{
		return $this->belongsTo('App\ungvien','id_ungvien');
	}
	public function tintuyendung()
	{
		return $this->belongsTo('App\tintuyendung','id_tintuyendung');
	}
	
}
