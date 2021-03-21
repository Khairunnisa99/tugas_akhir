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
}
