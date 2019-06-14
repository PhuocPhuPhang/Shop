<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinUser extends Model
{
    protected $table = "thong_tin_user";
    protected  $primaryKey = 'ma_nguoi_dung';
    public $incrementing = false;
    public $timestamps = true;

    // public function User()
    // {
    //      return $this->hasOne('App\User','email','email');
    // }
}