<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moa extends Model
{
    protected $fillable = [ 
    'number',
    'number_partner',
    'judul_moa',
    'id_fakultas',
    'id_partner',
    'number_mou',
    'tanggal_mulai',
    'tanggal_selesai',
    'status',
    'dokumen'

    ];
 public function partner()
    {
        return $this->belongsTo(Partner::class, 'id_partner');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id');
    }
    
}
