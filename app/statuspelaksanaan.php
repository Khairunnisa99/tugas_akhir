<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\programkerja;

class statuspelaksanaan extends Model
{
    protected $table='statuspelaksanaan';
    // protected $guarded=[];
    protected $fillable= [
            'statusPelaksanaan', 'keteranganStatus'
    ];
    // protected $primarykey = 'id';

    // public $timestamps = false;


}


