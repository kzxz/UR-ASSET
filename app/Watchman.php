<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchman extends Model
{
    protected $table = 'watchman';
    protected $fillable = ['watchman', 'bday', 'sex', 'contact', 'address' ];
    public $timestamps = false;
}

