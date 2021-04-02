<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    protected $table='dokumen';
    // protected $guarded = [];
    protected $fillable = ['namaDokumen', 'keterangan', 'file'];

    public function elemen()
    {
        return $this->belongsToMany(elemen::class);
    }
}
