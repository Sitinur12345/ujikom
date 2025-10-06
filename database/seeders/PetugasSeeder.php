<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        // Hapus data lama jika ada
        Petugas::query()->delete();
        User::where('email', 'admin@galeri-edu.com')->delete();
        User::where('email', 'siti@galeri-edu.com')->delete();

        // Buat data petugas (admin)
        Petugas::create([
            'username' => 'admin',
            'email' => 'admin@galeri-edu.com',
            'password' => Hash::make('admin123'),
        ]);

        // Buat data petugas (staff)
        Petugas::create([
            'username' => 'staff',
            'email' => 'siti@galeri-edu.com',
            'password' => Hash::make('staff123'),
        ]);

        // Buat user untuk login admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@galeri-edu.com',
            'password' => Hash::make('admin123'),
        ]);

        // Buat user untuk login staff
        User::create([
            'name' => 'Siti Nuraeni',
            'email' => 'siti@galeri-edu.com',
            'password' => Hash::make('siti123'),
        ]);

        User::create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@galeri-edu.com',
            'password' => Hash::make('kepsek123'),
        ]);
    }
}
