<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiCauHinh extends Model
{
    protected $table = "loai_cau_hinh";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function CauHinhSanPham()
    {
        return $this->hasMany('App\CauHinhSanPham','id_loai','id');
    }
}
