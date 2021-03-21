<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class statusprogramkerja extends Model
{
    protected $table='statusprogramkerja';
    protected $guarded=[];
    // protected $primaryKey = 'statusprogramkerja_idstatusprogramkerja';

    public function programKerja()
    {
        return $this->belongsTo(programkerja::class);
    }
}
