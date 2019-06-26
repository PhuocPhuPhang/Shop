<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = "khuyen_mai";
    protected  $primaryKey = 'ma_khuyen_mai';
    public $incrementing = true;
    public $timestamps = true;

    public function SanPham()
    {
         return $this->hasMany('App\SanPham','khuyen_mai','ma_khuyen_mai');
    }
}
