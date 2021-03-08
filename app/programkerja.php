<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programkerja extends Model
{
    protected $table='table_programkerja';
    protected $guarded=['idProgramkerja'];
    protected $primaryKey = 'idProgramkerja';
    public $timestamps = false;
}
