<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    protected $table = "nha_cung_cap";
    protected  $primaryKey = 'ma_nha_cung_cap';
    public $incrementing = false;
    public $timestamps = true;

    public function SanPham()
    {
         return $this->hasMany('App\SanPham','nha_cung_cap','ma_nha_cung_cap');
    }
}
