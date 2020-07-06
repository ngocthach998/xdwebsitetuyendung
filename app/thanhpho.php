<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanhpho extends Model
{
   protected $table="thanhpho";
   public $timestamps=false;
    public function thanhpho()
    {
    	return $this->hasMany('App\thanhpho','id_thanhpho');
    }
}
