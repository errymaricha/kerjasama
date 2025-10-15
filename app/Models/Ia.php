<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ia extends Model
{
    protected $fillable = [ 
        'number',
        'number_partner',
        'judul_ia',
        'id_partner',       // ✅ Tambahkan ini supaya bisa mass-assignment
        'id_fakultas',
        'number_moa',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'dokumen'
    ];

    public function moa(): BelongsTo
    {
        return $this->belongsTo(Moa::class);
    }

    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id');
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class, 'id_partner'); // ✅ Relasi baru
    }
}
