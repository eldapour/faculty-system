<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'department_name' => json_encode([
                    'ar' => 'هندسة',
                    'en' => 'engineering',
                    'fr' => 'ingénierie',
                ]),
                'department_code' => json_encode([
                    'ar' => 'ب2ب2',
                    'en' => 'b2b2',
                    'fr' => 'b2b2',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'department_name' => json_encode([
                    'ar' => 'فنون',
                    'en' => 'Arts',
                    'fr' => 'Arts',
                ]),
                'department_code' => json_encode([
                    'ar' => 'ب3ب3',
                    'en' => 'b3b3',
                    'fr' => 'b3b3',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'department_name' => json_encode([
                    'ar' => 'تجارة',
                    'en' => 'commerce',
                    'fr' => 'Commerce',
                ]),
                'department_code' => json_encode([
                    'ar' => 'ب4ب4',
                    'en' => 'b4b4',
                    'fr' => 'b4b4',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'department_name' => json_encode([
                    'ar' => 'صناعة',
                    'en' => 'industry',
                    'fr' => 'industrie',
                ]),
                'department_code' => json_encode([
                    'ar' => 'ب5ب5',
                    'en' => 'b5b5',
                    'fr' => 'b5b5',
                ]),
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('departments')->insert($data);
    }
}
