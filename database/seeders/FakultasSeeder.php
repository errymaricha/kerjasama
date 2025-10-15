<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('fakultas')->insert([
            ['kode' => 'ALL', 'nama_fakultas' => 'ALL'],
            ['kode' => 'FT', 'nama_fakultas' => 'Fakultas Teknik'],
            ['kode' => 'FEB', 'nama_fakultas' => 'Fakultas Ekonomi dan Bisnis'],
            ['kode' => 'FH', 'nama_fakultas' => 'Fakultas Hukum'],
            ['kode' => 'FP', 'nama_fakultas' => 'Fakultas Pertanian'],
            ['kode' => 'BPM', 'nama_fakultas' => 'BPM'],
            ['kode' => 'BAKU', 'nama_fakultas' => 'BAKU'],
            ['kode' => 'LP3M', 'nama_fakultas' => 'LP3M'],
            ['kode' => 'BAAK', 'nama_fakultas' => 'BAAK'],
            ['kode' => 'BSIKD', 'nama_fakultas' => 'BSIKD'],
            ['kode' => 'BSDM', 'nama_fakultas' => 'BSDM'],
            ['kode' => 'PERPUS', 'nama_fakultas' => 'Perpustakaan'],
            
            
        ]);
    }
}
