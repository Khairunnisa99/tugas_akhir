<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBabTiga extends Model
{
    protected $table = 'subsubbabtiga';
    protected $guarded = [];


    public function SubBab()
    {
        return $this->hasMany(SubBab::class, 'id_subbab', 'id');
    }
}
