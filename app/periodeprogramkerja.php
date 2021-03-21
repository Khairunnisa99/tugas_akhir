<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\programkerja;

class periodeprogramkerja extends Model
{
    protected $table='periodeprogramkerja';
    protected $guarded=[];


    public function programKerja()
    {
        return $this->belongsTo(programkerja::class);
    }
}
