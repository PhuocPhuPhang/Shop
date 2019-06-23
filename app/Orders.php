<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public static function CreateOrder(){
    	$user = Auth::user();
    	$user->Orders()->create();
    }
}
