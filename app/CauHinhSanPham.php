<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinhSanPham extends Model
{
    protected $table = "cau_hinh_san_pham";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function ThongTinSanPham()
    {
        return $this->hasMany('App\ThongTinSanPham','cau_hinh','id');
    }

}
