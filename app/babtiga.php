<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class babtiga extends Model
{
    protected $table='table_babtiga';
    protected $guarded=['idBabtiga'];
    protected $primaryKey = 'idBabtiga';
    public $timestamps = false;
}
