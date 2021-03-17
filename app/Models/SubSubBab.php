<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBab;

class SubSubBab extends Model
{

    protected $table = 'subsubbab';
    protected $guarded = [];


    public function Standar()
    {
        return $this->hasMany('app\Models\SubBab::class');
    }
}
