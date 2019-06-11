<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinSanPham extends Model
{
    protected $table = "thong_tin_san_pham";
    protected  $primaryKey = 'ma_san_pham';
    public $incrementing = false;
    public $timestamps = true;

    public function CauHinhSanPham()
    {
        return $this->hasOne('App\CauHinhSanPham','cau_hinh','id');
    }

    public function SanPham()
    {
        return $this->belongsTo('App\SanPham','ma_san_pham','ma_san_pham');
    }
}
