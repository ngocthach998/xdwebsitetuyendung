<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ungvien_ngoaingu extends Model
{
   protected $table="ungvien_ngoaingu";
    public $timestamps=false;//

     public function ungvien()
    {
        return $this->belongsTo('App\ungvien','id_ungvien');
    }
     public function ngoaingu()
    {
        return $this->belongsTo('App\ngoaingu','id_ngoaingu');
    }
}
