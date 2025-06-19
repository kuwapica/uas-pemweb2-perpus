<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('raks')->insert([
            [
                'kode_rak' => 'RAK01',
                'lokasi' => 'Baris pertama',
            ],
            [
                'kode_rak' => 'RAK02',
                'lokasi' => 'Baris Kedua',
            ],
            [
                'kode_rak' => 'RAK03',
                'lokasi' => 'Baris Ketiga',
            ],
            [
                'kode_rak' => 'RAK04',
                'lokasi' => 'Baris Keempat',
            ],
            [
                'kode_rak' => 'RAK05',
                'lokasi' => 'Baris Kelima',
            ],
            [
                'kode_rak' => 'RAK06',
                'lokasi' => 'Baris Keenam',
            ],
        ]);
    }
}
