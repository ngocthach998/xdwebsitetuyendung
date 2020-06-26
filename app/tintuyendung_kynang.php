<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuyendung_kynang extends Model
{
   protected $table="tintuyendung_thanhpho";
	public $timestamps=false;
	public function kn()
	{
		return $this->belongsTo('App\kynang','id_kynang');
	}
}
