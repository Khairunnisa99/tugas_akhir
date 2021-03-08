<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bab extends Model
{
    protected $table='table_bab';
    protected $guarded=['idBab'];
    protected $primaryKey = 'idBab';
    public $timestamps = false;
}
