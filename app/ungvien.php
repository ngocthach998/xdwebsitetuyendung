<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ungvien  extends Authenticatable
{
    use Notifiable;
    protected $table="ungvien";
    public $timestamps=false;
    const PASSWORD = 'matkhau';
    //const NAME = 'hoten';
    
    public function getAuthPassword()
    {
        return $this->matkhau;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'matkhau','hoten',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'matkhau', 'remember_token',
    ];

    public function thanhpho()
    {
        return $this->belongsTo('App\thanhpho','id_thanhpho');
    }


 /*    public function ungvien_thanhpho()
    {
        return $this->hasMany('App\ungvien_thanhpho','id_ungvien');
    }*/

    public function ungvien_thanhpho()
    {
        
        return $this->belongsToMany('App\thanhpho','ungvien_thanhpho','id_ungvien','id_thanhpho');
        
    }
        public function ungvien_kynang()
    {
        
        return $this->belongsToMany('App\kynang','ungvien_kynang','id_ungvien','id_kynang');
        
    }

  /*  public function ungvien_kynang()
    {
        return $this->hasMany('App\ungvien_kynang','id_ungvien');
    }*/
    public function ungvien_ngoaingu()
    {
        return $this->hasMany('App\ungvien_ngoaingu','id_ungvien');
    }
     public function nguoithamkhao()
    {
        return $this->hasMany('App\nguoithamkhao','id_ungvien');
    }
    public function trinhdotinhoc()
    {
        return $this->hasMany('App\trinhdotinhoc','id_ungvien');
    }
     public function kinhnghiemlamviec()
    {
        return $this->hasMany('App\kinhnghiemlamviec','id_ungvien');
    }
     public function trinhdobangcap()
    {
        return $this->hasMany('App\trinhdobangcap','id_ungvien');
    }
    public function nganhnghe()
    {
        return $this->belongsTo('App\nganhnghe','id_nganhnghe');
    }
     public function capbac()
    {
        return $this->belongsTo('App\capbac','id_capbac');
    }
     public function hinhthuclamviec()
    {
        return $this->belongsTo('App\hinhthuclamviec','id_hinhthuclamviec');
    }
     public function kinhnghiem()
    {
        return $this->belongsTo('App\kinhnghiem','id_kinhnghiem');
    }
     public function trinhdo()
    {
        return $this->belongsTo('App\trinhdo','id_trinhdo');
    }

    public function tintuyendung()
    {
        return $this->hasMany('App\ungvien_nop_tin','id_ungvien');
    }
}
