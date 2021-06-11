<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategori";
    public $timestamps = false;
    protected $fillable=[
        'nama'
    ];
}
