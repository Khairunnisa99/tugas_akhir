<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBabEmpat extends Model
{
    protected $table = 'subsubbabempat';
    protected $guarded = [];


    public function SubBab()
    {
        return $this->hasMany(SubBab::class, 'id_subbab', 'id');
    }
}
