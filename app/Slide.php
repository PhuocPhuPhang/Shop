<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";
    protected $primaryKey = "id";
    public $incrementing = false;
    public $timestamps = true;
}
