<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "san_pham";
    protected  $primaryKey = 'ma_san_pham';
    public $incrementing = false;
    public $timestamps = true;

    public function NhaCungCap()
    {
        return $this->belongsTo('App\NhaCungCap','nha_cung_cap','ma_nha_cung_cap');
    }

    public function HinhAnh()
    {
        return $this->hasMany('App\HinhAnh','hinh_anh','id');
    }

    public function ThongTinSanPham()
    {
        return $this->hasMany('App\ThongTinSanPham','ma_san_pham','ma_san_pham');
    }

    public function KhuyenMai()
    {
        return $this->belongsTo('App\KhuyenMai','khuyen_mai','ma_khuyen_mai');
    }

}
