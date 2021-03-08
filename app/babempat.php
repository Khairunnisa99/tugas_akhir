<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class babempat extends Model
{
    protected $table='table_babempat';
    protected $guarded=['idBabempat'];
    protected $primaryKey = 'idBabempat';
    public $timestamps = false;
}

