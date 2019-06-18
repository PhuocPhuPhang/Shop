<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucKhuyenMai extends Model
{
    protected $table = "hinh_thuc_khuyen_mai";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
