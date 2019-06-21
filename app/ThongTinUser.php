<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinUser extends Model
{
    protected $table = "thong_tin_nguoi_dung";
    protected  $primaryKey = 'id';
    public $incrementing =true;
    public $timestamps = true;

    public function User()
    {
         return $this->hasOne('App\User','email','email');
    }
}
