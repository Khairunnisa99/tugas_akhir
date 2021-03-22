<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelaksanaanprogram extends Model
{


    protected $table='pelaksanaanprogram';
    protected $guarded = [];



    public function programkerja()
    {
        return $this->hasMany(programkerja::class);
    }
    public function tipepelaksanaan()
    {
        return $this->hasMany(tipepelaksanaan::class);
    }

    public function statuspelaksanaan()
    {
        //return $this->hasMany('App\Models\SubBab');
        return $this->hasMany(statuspelaksanaan::class, 'SubSubBab_idSubSubBab', 'id');
    }

}
