<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programkerja extends Model
{
    protected $table = 'programkerja';
    protected $guarded = [];



    public function statusProgram()
    {
        return $this->hasMany(statusprogramkerja::class);
    }

    public function tipeProgram()
    {
        return $this->hasMany(tipeprogramkerja::class);
    }
    public function periodeProgram()
    {
        return $this->hasMany(periodeprogramkerja::class);
    }

    public function statuspelaksanaan()
    {
        //return $this->hasMany('App\Models\SubBab');
        return $this->hasMany(statuspelaksanaan::class, 'SubSubBab_idSubSubBab', 'id');
    }

}
