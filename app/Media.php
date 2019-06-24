<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "media";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $timestamps = true;
}
