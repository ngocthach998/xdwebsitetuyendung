<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ungvien  extends Authenticatable
{
    use HasApiTokens,Notifiable;
    protected $table="ungvien";
    public $timestamps=false;
    const PASSWORD = 'password';
    const NAME = 'hoten';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','hoten',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tp()
    {
        return $this->belongsTo('App\thanhpho','id_thanhpho');
    }

    public function tintuyendung()
    {
        return $this->hasMany('App\ungvien_nop_tin','id_ungvien');
    }
}
