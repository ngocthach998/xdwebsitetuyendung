<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuyendung_thanhpho extends Model
{
	protected $table="tintuyendung_thanhpho";
	public $timestamps=false;
	public function tp()
	{
		return $this->belongsTo('App\thanhpho','id_thanhpho');
	}
}
