<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Publikasi extends Model
{
    protected $table = "publikasi";
    public $timestamps = false;
    protected $fillable=[
        'judul'
    ];
}
