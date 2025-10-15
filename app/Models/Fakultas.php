<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    protected $fillable = [
        
        'kode',
        'nama_fakultas',
    
    ];

   public function mous()
    {
        return $this->hasMany(Mou::class, 'id_fakultas', 'id');
    }

    public function moas()
    {
        return $this->hasMany(Moa::class, 'id_fakultas', 'id');
    }

    public function ias()
    {
        return $this->hasMany(Ia::class, 'id_fakultas', 'id');
    }
}
