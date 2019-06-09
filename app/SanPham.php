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
        return $this->belongsTo('App\HinhAnh','nha_cung_cap','ma_nha_cung_cap');
    }

}
