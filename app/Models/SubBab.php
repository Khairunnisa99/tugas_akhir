<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBab extends Model
{
    protected $table = 'subbab';

    protected $guarded = [];

    public function Bab()
    {
        return $this->hasMany('App\Models\Bab');
    }

    public function SubSubBab()
    {
        return $this->belongsTo(SubSubBab::class, 'id', 'id_subbab');
    }
    public function SubBabDua()
    {
        return $this->belongsTo(SubBabDua::class, 'id', 'id_subbab');
    }
    public function SubBabTiga()
    {
        return $this->belongsTo(SubBabTiga::class, 'id', 'id_subbab');
    }
    public function SubBabEmpat()
    {
        return $this->belongsTo(SubBabEmpat::class, 'id', 'id_subbab');
    }
}
