<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    protected $table = "hinh_anh_san_pham";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
