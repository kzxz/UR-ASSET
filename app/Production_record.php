<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon;
class Production_record extends Model
{
    protected $table = 'production_record' ;
    protected $fillable = [ 'watchman_id', 'date', 'trays_count', 'pieces', 'cracks', 'mortality', 'description'];



//    public function getDateAttribute($value){
//
//    }
}
