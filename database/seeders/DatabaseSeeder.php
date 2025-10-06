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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        // Seeder kategori default sesuai requirement UKK
        \App\Models\Kategori::query()->delete();
        $kategoriList = [
            'Informasi Terkini',
            'Galery Sekolah', 
            'Agenda Sekolah',
        ];
        foreach ($kategoriList as $judul) {
            \App\Models\Kategori::create(['judul' => $judul]);
        }

        // Panggil PetugasSeeder
        $this->call(PetugasSeeder::class);
    }
}

