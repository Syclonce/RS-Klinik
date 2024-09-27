<?php

namespace Database\Seeders;

use App\Models\setbpjs as setbpjss;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class setbpjsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        setbpjss::create([
            'BPJS_PCARE_CONSID' => '4337',
            'BPJS_PCARE_SCREET_KEY' => '8dI0FE22A8',
            'BPJS_PCARE_USERNAME' => '0123B004',
            'BPJS_PCARE_PASSWORD' => 'Raisa123!',
            'BPJS_PCARE_APP_CODE' => '095',
            'BPJS_PCARE_USER_KEY' => 'a447c3e201c1ce66507579942452151d',
            'BPJS_PCARE_BASE_URL' => 'https://apijkn.bpjs-kesehatan.go.id',
            'BPJS_PCARE_SERVICE_NAME' => 'pcare-rest',
        ]);
        
    }
}
