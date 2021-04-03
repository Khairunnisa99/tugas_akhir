<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBab;

class Bab extends Model
{
    protected $table = 'babakreditasi';

    protected $guarded = [];


    public function Standar()
    {
        return $this->belongsTo('App\Models\SubBab', 'periodeakreditasi_idperiodeakreditasi', 'id');
    }
}
