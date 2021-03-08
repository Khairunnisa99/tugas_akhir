<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    protected $table='table_dokumen';
    protected $guarded=['idDokumen'];
    protected $primaryKey = 'idDokumen';
    public $timestamps = false;
}