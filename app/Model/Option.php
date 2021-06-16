<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = "option";
    public $timestamps = false;
    protected $fillable=[
        'option_name'
    ];
}
