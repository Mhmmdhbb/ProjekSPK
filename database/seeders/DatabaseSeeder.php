<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'role' => 'user',
        ]);

        // Create Kriteria
        $criteria = [
            ['kode_kriteria' => 'C1', 'nama_kriteria' => 'Pemilahan Sampah', 'bobot' => 15, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C2', 'nama_kriteria' => 'Pengurangan Penggunaan Plastik', 'bobot' => 20, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C3', 'nama_kriteria' => 'Ketersediaan Tempat Sampah', 'bobot' => 20, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C4', 'nama_kriteria' => 'Pengelolaan Limbah Organik', 'bobot' => 15, 'tipe' => 'benefit'],
            ['kode_kriteria' => 'C5', 'nama_kriteria' => 'Kebersihan Area Kantin', 'bobot' => 30, 'tipe' => 'benefit'],
        ];

        foreach ($criteria as $c) {
            \App\Models\Kriteria::create($c);
        }

        // Create Sub Kriteria
        $subKriteria = [
            // C1 - Pemilahan Sampah
            ['kriteria_id' => 1, 'nama_sub' => 'Dipilah Lengkap', 'nilai' => 5],
            ['kriteria_id' => 1, 'nama_sub' => 'Dipilah Sebagian', 'nilai' => 3],
            ['kriteria_id' => 1, 'nama_sub' => 'Tidak Dipilah', 'nilai' => 1],
            
            // C2 - Pengurangan Penggunaan Plastik
            ['kriteria_id' => 2, 'nama_sub' => 'Rendah', 'nilai' => 5],
            ['kriteria_id' => 2, 'nama_sub' => 'Sedang', 'nilai' => 3],
            ['kriteria_id' => 2, 'nama_sub' => 'Tinggi', 'nilai' => 1],
            
            // C3 - Ketersediaan Tempat Sampah
            ['kriteria_id' => 3, 'nama_sub' => 'Lengkap', 'nilai' => 5],
            ['kriteria_id' => 3, 'nama_sub' => 'Cukup', 'nilai' => 3],
            ['kriteria_id' => 3, 'nama_sub' => 'Kurang', 'nilai' => 1],
            
            // C4 - Pengelolaan Limbah Organik
            ['kriteria_id' => 4, 'nama_sub' => 'Dikelola', 'nilai' => 5],
            ['kriteria_id' => 4, 'nama_sub' => 'Kadang Dikelola', 'nilai' => 3],
            ['kriteria_id' => 4, 'nama_sub' => 'Tidak Dikelola', 'nilai' => 1],
            
            // C5 - Kebersihan Area Kantin
            ['kriteria_id' => 5, 'nama_sub' => 'Bersih', 'nilai' => 5],
            ['kriteria_id' => 5, 'nama_sub' => 'Cukup Bersih', 'nilai' => 3],
            ['kriteria_id' => 5, 'nama_sub' => 'Kotor', 'nilai' => 1],
        ];

        foreach ($subKriteria as $sk) {
            \App\Models\SubKriteria::create($sk);
        }

        // Create Alternatif (Kantin)
        $alternatifs = [
            ['kode_alternatif' => 'KU1', 'nama_alternatif' => 'Kantin Universitas Janabadra Pingit'],
            ['kode_alternatif' => 'KU2', 'nama_alternatif' => 'Kantin Universitas Janabadra Timoho'],
            ['kode_alternatif' => 'KU3', 'nama_alternatif' => 'Kantin Universitas Islam Negeri Sunan Kalijaga Yogyakarta'],
        ];

        foreach ($alternatifs as $a) {
            \App\Models\Alternatif::create($a);
        }

        // Create Penilaian (Assessment)
        $penilaians = [
            // KU1
            ['alternatif_id' => 1, 'kriteria_id' => 1, 'nilai' => 3],
            ['alternatif_id' => 1, 'kriteria_id' => 2, 'nilai' => 5],
            ['alternatif_id' => 1, 'kriteria_id' => 3, 'nilai' => 5],
            ['alternatif_id' => 1, 'kriteria_id' => 4, 'nilai' => 1],
            ['alternatif_id' => 1, 'kriteria_id' => 5, 'nilai' => 3],
            
            // KU2
            ['alternatif_id' => 2, 'kriteria_id' => 1, 'nilai' => 1],
            ['alternatif_id' => 2, 'kriteria_id' => 2, 'nilai' => 5],
            ['alternatif_id' => 2, 'kriteria_id' => 3, 'nilai' => 5],
            ['alternatif_id' => 2, 'kriteria_id' => 4, 'nilai' => 1],
            ['alternatif_id' => 2, 'kriteria_id' => 5, 'nilai' => 1],
            
            // KU3
            ['alternatif_id' => 3, 'kriteria_id' => 1, 'nilai' => 3],
            ['alternatif_id' => 3, 'kriteria_id' => 2, 'nilai' => 5],
            ['alternatif_id' => 3, 'kriteria_id' => 3, 'nilai' => 3],
            ['alternatif_id' => 3, 'kriteria_id' => 4, 'nilai' => 3],
            ['alternatif_id' => 3, 'kriteria_id' => 5, 'nilai' => 5],
        ];

        foreach ($penilaians as $p) {
            \App\Models\Penilaian::create($p);
        }
    }
}
