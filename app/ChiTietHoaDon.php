<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = "chi_tiet_hoa_don";
    protected $primaryKey = "ma_hoa_don,ma_san_pham";
    public $incrementing = false;
    public $timestamps = false;
}
