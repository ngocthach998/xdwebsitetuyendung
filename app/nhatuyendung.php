<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class nhatuyendung extends Authenticatable
{
	use Notifiable;
	protected $table="nhatuyendung";
	public $timestamps=false;
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
    public function getAuthPassword()
    {
    	return $this->matkhau;
    }

   public function thanhpho()
    {
        return $this->belongsTo('App\thanhpho','id_thanhpho');
    }
    public function quymonhansu()
    {
        return $this->belongsTo('App\quymonhansu','id_quymonhansu');
    }
    public function tintuyendung()
    {
        return $this->hasMany('App\tintuyendung','id_nhatuyendung');
    }
}
