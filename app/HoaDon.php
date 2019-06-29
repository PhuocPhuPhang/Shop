<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = "hoa_don";
    protected $primaryKey = "ma_hoa_don";
    public $incrementing = false;
    public $timestamps = false;

    public function ChiTietHoaDon()
    {
        return $this->hasMany('App\ChiTietHoaDon','ma_hoa_don','ma_hoa_don');
    }
}
