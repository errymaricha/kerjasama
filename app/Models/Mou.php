<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    protected $fillable = [
        
        'number',
        'number_partner',
        'judul_mou',
        'id_partner',
        'id_fakultas',
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

     public function getIsActiveAttribute()
    {
        $today = Carbon::today();

        return $today->between(Carbon::parse($this->tanggal_mulai), Carbon::parse($this->tanggal_selesai));
    }
    // public function fakultas()
    // {
    //     return $this->belongsTo(Partner::class, 'id_fakultas');
    // }
}
