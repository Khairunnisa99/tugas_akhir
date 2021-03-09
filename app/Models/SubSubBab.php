<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubBab;

class SubSubBab extends Model
{

    protected $table = 'subsubbab';
    protected $guarded = [];


    public function SubBab()
    {
        return $this->hasMany(SubBab::class, 'id_subbab', 'id');
    }
}
