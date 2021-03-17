<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elemen extends Model
{
    protected $table = 'elemen';

    protected $guarded = [];

    public function kriteria()
    {
        //return $this->hasMany('App\Models\SubBab');
        return $this->hasMany(kriteria::class, 'SubSubBab_idSubSubBab', 'id');
    }
}
