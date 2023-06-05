<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UniversitySettingSeeder extends Seeder
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
                'email' => 'qeducato@gmail.com',
                'logo' => 'assets/front/assets/photo/logo.png',
                'title' => json_encode([
                    'ar' => 'Qeducato',
                    'en' => 'Qeducato',
                    'fr' => 'Qeducato'
                ]),
                'description' => json_encode([
                    'ar' => 'Qeducato',
                    'en' => 'Qeducato',
                    'fr' => 'Qeducato',
                ]),
                'address' => json_encode([
                    'ar' => 'Qeducato',
                    'en' => 'Qeducato',
                    'fr' => 'Qeducato',
                ]),
                'facebook_link' => 'https://www.facebook.com/Qeducato',
                'created_at' => Carbon::now(),
            ]
        ];

        DB::table('university_settings')->insert($data);
    }
}
