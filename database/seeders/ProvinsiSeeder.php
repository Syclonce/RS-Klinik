<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['kode' => '11', 'name' => 'ACEH'],
            ['kode' => '12', 'name' => 'SUMATERA UTARA'],
            ['kode' => '13', 'name' => 'SUMATERA BARAT'],
            ['kode' => '14', 'name' => 'RIAU'],
            ['kode' => '15', 'name' => 'JAMBI'],
            ['kode' => '16', 'name' => 'SUMATERA SELATAN'],
            ['kode' => '17', 'name' => 'BENGKULU'],
            ['kode' => '18', 'name' => 'LAMPUNG'],
            ['kode' => '19', 'name' => 'KEPULAUAN BANGKA BELITUNG'],
            ['kode' => '21', 'name' => 'KEPULAUAN RIAU'],
            ['kode' => '31', 'name' => 'DKI JAKARTA'],
            ['kode' => '32', 'name' => 'JAWA BARAT'],
            ['kode' => '33', 'name' => 'JAWA TENGAH'],
            ['kode' => '34', 'name' => 'DAERAH ISTIMEWA YOGYAKARTA'],
            ['kode' => '35', 'name' => 'JAWA TIMUR'],
            ['kode' => '36', 'name' => 'BANTEN'],
            ['kode' => '51', 'name' => 'BALI'],
            ['kode' => '52', 'name' => 'NUSA TENGGARA BARAT'],
            ['kode' => '53', 'name' => 'NUSA TENGGARA TIMUR'],
            ['kode' => '61', 'name' => 'KALIMANTAN BARAT'],
            ['kode' => '62', 'name' => 'KALIMANTAN TENGAH'],
            ['kode' => '63', 'name' => 'KALIMANTAN SELATAN'],
            ['kode' => '64', 'name' => 'KALIMANTAN TIMUR'],
            ['kode' => '65', 'name' => 'KALIMANTAN UTARA'],
            ['kode' => '71', 'name' => 'SULAWESI UTARA'],
            ['kode' => '72', 'name' => 'SULAWESI TENGAH'],
            ['kode' => '73', 'name' => 'SULAWESI SELATAN'],
            ['kode' => '74', 'name' => 'SULAWESI TENGGARA'],
            ['kode' => '75', 'name' => 'GORONTALO'],
            ['kode' => '76', 'name' => 'SULAWESI BARAT'],
            ['kode' => '81', 'name' => 'MALUKU'],
            ['kode' => '82', 'name' => 'MALUKU UTARA'],
            ['kode' => '91', 'name' => 'PAPUA'],
            ['kode' => '92', 'name' => 'PAPUA BARAT'],
            ['kode' => '93', 'name' => 'PAPUA SELATAN'],
            ['kode' => '94', 'name' => 'PAPUA TENGAH'],
            ['kode' => '95', 'name' => 'PAPUA PEGUNUNGAN']
        ];

        DB::table('provinsi')->insert($provinces);
    }
}
