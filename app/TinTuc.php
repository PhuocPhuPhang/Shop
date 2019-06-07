<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "tin_tuc";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function LoaiTinTuc()
    {
        return $this->belongsTo('App\LoaiTinTuc','id_loai','id');
    }
}
