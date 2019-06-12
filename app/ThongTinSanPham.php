<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongTinSanPham extends Model
{
    protected $table = "thong_tin_san_pham";
    protected  $primaryKey = 'id';
    public $incrementing =true;
    public $timestamps = true;

    public function CauHinhSanPham()
    {
        return $this->hasMany('App\CauHinhSanPham','cau_hinh','id');
    }

    public function SanPham()
    {
        return $this->belongsTo('App\SanPham','ma_san_pham','ma_san_pham');
    }
}
