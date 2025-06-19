<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            [
                'judul' => 'Jakarta Sebelum Pagi',
                'penulis' => 'Ziggy Zezsyazeoviennnazabrizkie',
                'tahun_terbit' => '2017',
                'kategori_id' => 4,
                'rak_id' => 1,
            ],
            [
                'judul' => 'Rumah Lebah',
                'penulis' => 'Ruwi Meita',
                'tahun_terbit' => '2008',
                'kategori_id' => 7,
                'rak_id' => 2,
            ],
            [
                'judul' => 'The Hunger Games',
                'penulis' => 'Suzanne Collins',
                'tahun_terbit' => '2008',
                'kategori_id' => 2,
                'rak_id' => 1,
            ],
            [
                'judul' => 'Laut Berceita',
                'penulis' => 'Leila S. Chudori',
                'tahun_terbit' => '2017',
                'kategori_id' => 3,
                'rak_id' => 4,
            ],
            [
                'judul' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => '1980',
                'kategori_id' => 1,
                'rak_id' => 4,
            ],
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => '2005',
                'kategori_id' => 8,
                'rak_id' => 6,
            ],
            [
                'judul' => 'Aroma Karsa',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => '2018',
                'kategori_id' => 2,
                'rak_id' => 1,
            ],
            [
                'judul' => 'Kosmos',
                'penulis' => 'Carl Sagan',
                'tahun_terbit' => '1980',
                'kategori_id' => 10,
                'rak_id' => 5,
            ],
            [
                'judul' => 'Percy Jackson & The Olympians: Lightning Thief',
                'penulis' => 'Rick Riordan',
                'tahun_terbit' => '2005',
                'kategori_id' => 2,
                'rak_id' => 5,
            ],
            [
                'judul' => 'Pride and Prejudice',
                'penulis' => 'Jane Austen',
                'tahun_terbit' => '1816',
                'kategori_id' => 1,
                'rak_id' => 1,
            ],
            [
                'judul' => 'The Power of Habit',
                'penulis' => 'Charles Duhigg',
                'tahun_terbit' => '2012',
                'kategori_id' => 9,
                'rak_id' => 2,
            ],
            [
                'judul' => 'Sherlock Holmes: A Study in Scarlet',
                'penulis' => 'Sir Arthur Conan Doyle',
                'tahun_terbit' => '1887',
                'kategori_id' => 7,
                'rak_id' => 6,
            ],
        ]);
    }
}
