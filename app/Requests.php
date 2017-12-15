<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = [
    	'from_ip', 'header', 'params', 'response'
    ];
}
