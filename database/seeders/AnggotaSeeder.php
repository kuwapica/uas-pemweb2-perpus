<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggotas')->insert([
            [
                'nama' => 'Rania Sekarwati',
                'nim' => 'H1D023001',
                'no_hp' => '087654567876',
                'alamat' => 'Banyumas',
            ],
            [
                'nama' => 'Alam Santoso',
                'nim' => 'H1D023002',
                'no_hp' => '087987432567',
                'alamat' => 'Bekasi',
            ],
            [
                'nama' => 'Vania Lestari',
                'nim' => 'H1D023003',
                'no_hp' => '081087482567',
                'alamat' => 'Cilacap',
            ],
        ]);
    }
}
