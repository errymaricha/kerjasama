<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'nama_partner',
        'alamat',
        'Kontak',
        'email',
    ];
    public function mous()
{
    return $this->hasMany(Mou::class, 'id_partner');
}
}
