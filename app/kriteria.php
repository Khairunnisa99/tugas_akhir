<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $table = 'subsubbab';

    protected $guarded = [];

    public function SubSubBab()
    {
        //return $this->hasMany('App\Models\SubBab');
        return $this->hasMany(SubBab::class, 'id_subbab', 'id');
    }

    public function Elemen()
    {
        return $this->belongsTo('App\elemen::class');
    }
}
