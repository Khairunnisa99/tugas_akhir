<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programkerja extends Model
{
    protected $table='programkerja';
    protected $guarded=[];


    public function statuspelaksanaan()
    {
        //return $this->hasMany('App\Models\SubBab');
        return $this->hasMany(statuspelaksanaan::class, 'SubSubBab_idSubSubBab', 'id');
    }

}
