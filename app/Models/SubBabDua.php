<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubBabDua extends Model
{
    protected $table = 'subsubbabdua';
    protected $guarded = [];


    public function SubBab()
    {
        return $this->hasMany(SubBab::class, 'id_subbab', 'id');
    }
    
}
