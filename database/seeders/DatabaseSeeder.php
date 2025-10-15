<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
        UserSeeder::class,
        FakultasSeeder::class,
        MoaSeeder::class,
        MouSeeder::class,
        IaSeeder::class,
        PartnerSeeder::class,
        

        // Tambah seeder lain jika ada
        ]);


        
    }
}
