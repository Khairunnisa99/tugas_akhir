<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class babdua extends Model
{
    protected $table='table_babdua';
    protected $guarded=['idBabdua'];
    protected $primaryKey = 'idBabdua';
    public $timestamps = false;
}
