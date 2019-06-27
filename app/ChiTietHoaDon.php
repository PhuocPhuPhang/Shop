<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = "chi_tiet_hoa_don";
    protected $primaryKey = "ma_hoa_don,ma_san_pham";
    public $incrementing = false;
    public $timestamps = false;

    public function HoaDon()
    {
        return $this->belongsTo('App\HoaDon','ma_hoa_don','ma_hoa_don');
    }

    public function SanPham()
    {
        return $this->hasMany('App\SanPham','ma_san_pham','ma_san_pham');
    }
}
