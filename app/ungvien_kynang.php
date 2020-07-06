<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ungvien_kynang extends Model
{
    protected $table="ungvien_kynang";
    public $timestamps=false;//
      public function ungvien()
    {
        return $this->belongsTo('App\ungvien','id_ungvien');
    }
     public function kynang()
    {
        return $this->belongsTo('App\kyang','id_kynang');
    }
}
