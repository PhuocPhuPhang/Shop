<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = "phan_quyen";
    protected  $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    public function quyen()
    {
        return $this->belongsTo('App\User','id','quyen');
    }
}
