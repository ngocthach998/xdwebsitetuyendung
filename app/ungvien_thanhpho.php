<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ungvien_thanhpho extends Model
{
	protected $table="ungvien_thanhpho";
    public $timestamps=false;//



    public function thanhpho()
    {
    	return $this->belongsTo('App\thanhpho','id_thanhpho');
    }
    public function ungvien()
    {
    	return $this->belongsTo('App\ungvien','id_ungvien');
    }
}
