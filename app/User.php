<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function ThongTinUser()
    {
        return $this->hasOne('App\ThongTinUser','email','email');
    }
}
