<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTinTuc extends Model
{
    protected $table = "loai_tin_tuc";
    protected  $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;

    public function TinTuc()
    {
        return $this->hasMany('App\TinTuc','id_loai','id');
    }
}
