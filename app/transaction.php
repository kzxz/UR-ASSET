<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transaction' ;
    protected $fillable = [  'id', 'date', 'type', 'amount', 'description', 'No_trays', 'No_pieces', 'Cracks', 'accounts_id'];
}
