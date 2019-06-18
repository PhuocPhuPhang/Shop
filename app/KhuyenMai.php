<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = "khuyen_mai";
    protected  $primaryKey = 'ma_khuyen_mai';
    public $timestamps = true;

    public function HinhThucKhuyenMai()
    {
        return $this->belongsTo('App\HinhThucKhuyenMai','ma_khuyen_mai','ma_khuyen_mai');
    }
}
