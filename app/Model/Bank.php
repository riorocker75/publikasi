<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table= "bank";
    public $timestamps = false;
    protected $fillable =[
      'nama',
    ];
}
