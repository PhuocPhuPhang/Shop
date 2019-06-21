<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "tin_tuc";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
