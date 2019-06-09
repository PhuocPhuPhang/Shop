<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = "hinh_anh_san_pham";
    protected  $primaryKey = 'ma_san_pham';
    public $incrementing = false;
    public $timestamps = true;

    public function SanPham()
    {
        return $this->hasMany('App\SanPham','hinh_anh','ma_san_pham');
    }
}
