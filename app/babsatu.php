<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class babsatu extends Model
{
    protected $table='table_babsatu';
    protected $guarded=['idBabsatu'];
    protected $primaryKey = 'idBabsatu';
    public $timestamps = false;
}
