<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = "khuyen_mai";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
