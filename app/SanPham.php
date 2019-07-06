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

    public function ThongTinSanPham()
    {
        return $this->hasMany('App\ThongTinSanPham','ma_san_pham','ma_san_pham');
    }
    public function ChiTietHoaDon()
    {
        return $this->hasMany('App\ChiTietHoaDon','ma_san_pham','ma_san_pham');
    }

}
