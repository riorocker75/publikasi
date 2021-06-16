<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    protected $table = "taxonomy";
    public $timestamps = false;
    protected $fillable=[
        'post_id'
    ];
}
