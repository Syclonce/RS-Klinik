<?php

namespace Database\Seeders;

use App\Models\setsatusehat as ModelsSetsatusehat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class setsatusehatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSetsatusehat::create(
            [
                'org_id' => '100020458',
                'client_id' => 'ix7vdGqqjX6J1rd68UScZ3lNHfNBw5vS7BWEjrGU0pFFksaU',
                'client_secret' => 'wr2fpYNBvYaB6jCssxFmVE5MIUbRu9TuaG0ILRyXyY7fKM9YlqgQpwcDoTpy5GcQ',
                'SATUSEHAT_BASE_URL' => 'https://api-satusehat.kemkes.go.id',
            ]
        );
    }
}
