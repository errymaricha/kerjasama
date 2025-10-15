<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);

        // Buat user admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        // Buat user staff per fakultas / unit
        $staff_FT = User::firstOrCreate(
            ['email' => 'ft@gmail.com'],
            [
                'name' => 'Staff Fakultas Teknik',
                'password' => Hash::make('password'),
                'id_fakultas' => 1      
            ]
        );
        $staff_FEB = User::firstOrCreate(
            ['email' => 'feb@gmail.com'],
            [
                'name' => 'Staff Fakultas Ekonomi',
                'password' => Hash::make('password'),
                'id_fakultas' => 2      
            ]
        );
        $staff_FH = User::firstOrCreate(
            ['email' => 'fh@gmail.com'],
            [
                'name' => 'Staff Fakultas Hukum',
                'password' => Hash::make('password'),
                'id_fakultas' => 3      
            ]
        );
        $staff_FP = User::firstOrCreate(
            ['email' => 'fp@gmail.com'],
            [
                'name' => 'Staff Fakultas Pertanian',
                'password' => Hash::make('password'),
                'id_fakultas' => 4      
            ]
        );
        $staff_BSIKD = User::firstOrCreate(
            ['email' => 'bsikd@gmail.com'],
            [
                'name' => 'Staff BSIKD',
                'password' => Hash::make('password'),
                'id_fakultas' => 5      
            ]
        );
        $staff_BPM = User::firstOrCreate(
            ['email' => 'bpm@gmail.com'],
            [
                'name' => 'Staff BPM',
                'password' => Hash::make('password'),
                'id_fakultas' => 6      
            ]
        );
        $staff_BAAK = User::firstOrCreate(
            ['email' => 'baak@gmail.com'],
            [
                'name' => 'Staff BAAK',
                'password' => Hash::make('password'),
                'id_fakultas' => 7      
            ]
        );
        $staff_BAKU = User::firstOrCreate(
            ['email' => 'baku@gmail.com'],
            [
                'name' => 'Staff BAKU',
                'password' => Hash::make('password'),
                'id_fakultas' => 8      
            ]
        );
        $staff_LP3M = User::firstOrCreate(
            ['email' => 'lp3m@gmail.com'],
            [
                'name' => 'Staff LP3M',
                'password' => Hash::make('password'),
                'id_fakultas' => 9      
            ]
        );
        $staff_BSDM = User::firstOrCreate(
            ['email' => 'bsdm@gmail.com'],
            [
                'name' => 'Staff BSDM',
                'password' => Hash::make('password'),
                'id_fakultas' => 10      
            ]
        );
        $staff_Perpustakaan = User::firstOrCreate(
            ['email' => 'perpus@gmail.com'],
            [
                'name' => 'Staff Perpustakaan',
                'password' => Hash::make('password'),
                'id_fakultas' => 11      
            ]
        );

        // Assign role staff untuk semua user di atas
        $staff_FT->assignRole($staffRole);
        $staff_FEB->assignRole($staffRole);
        $staff_FH->assignRole($staffRole);
        $staff_FP->assignRole($staffRole);
        $staff_BSIKD->assignRole($staffRole);
        $staff_BPM->assignRole($staffRole);
        $staff_BAAK->assignRole($staffRole);
        $staff_BAKU->assignRole($staffRole);
        $staff_LP3M->assignRole($staffRole);
        $staff_BSDM->assignRole($staffRole);
        $staff_Perpustakaan->assignRole($staffRole);
    }
}
