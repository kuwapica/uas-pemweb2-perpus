<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            // 1
            [
                'nama_kategori' => 'Klasik',
            ],
            // 2
            [
                'nama_kategori' => 'Fantasi',
            ],
            // 3
            [
                'nama_kategori' => 'Fiksi Sejarah',
            ],
            // 4
            [
                'nama_kategori' => 'Young Adult',
            ],
            // 5
            [
                'nama_kategori' => 'Sosial Politik',
            ],
            // 6
            [
                'nama_kategori' => 'Agama',
            ],
            // 7
            [
                'nama_kategori' => 'Misteri',
            ],
            // 8
            [
                'nama_kategori' => 'Fiksi Remaja',
            ],
            // 9
            [
                'nama_kategori' => 'Psikologi',
            ],
            // 10
            [
                'nama_kategori' => 'Sains',
            ],
        ]);
    }
}
