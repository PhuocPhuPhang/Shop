<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
}
