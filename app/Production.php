<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'watchman' ;
    protected $fillable = ['watchman', 'bday', 'sex', 'contact', 'address' ];
    public $timestamps = false;
}
