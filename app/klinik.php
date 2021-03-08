<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class klinik extends Model
{
    protected $table='table_klinik';
    protected $guarded=['idKlinik'];
    protected $primaryKey = 'idKlinik';
    public $timestamps = false;
}
