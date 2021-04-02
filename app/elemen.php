<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elemen extends Model
{
    protected $table = 'elemen';

    // protected $guarded = [];

    protected $fillable = [
        'SubSubBab_idSubSubBab', 'NoElemen', 'ElemenPenilaian', 'TelusurSasaran', 'MateriTelusur',
        'DokumentInternal', 'DokumenEksternal'
    ];

    public function kriteria()
    {
        return $this->belongsToMany(kriteria::class);
        // return $this->hasMany(dokumen::class, 'Documen_idDocumen','id');

    }

    public function dokumen()
    {
        return $this->belongsToMany(dokumen::class);
    }

}
