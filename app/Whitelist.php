<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whitelist extends Model
{
     protected $fillable = [
    	'field' ,'value', 'admin_id'
    ];
}
