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
                'logo' => '901688971038.png',
                'stamp_logo' => '20230711100951.png',
                'digital_student_platform' => 'faculty student',
                'colleges_digital_platform' => 'faculty digital',
                'colleges_digital_magazine' => 'faculty magazine',
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
                'maintenance' => 0,
                'reregister_start' => '2023-08-23',
                'reregister_end' => '2023-08-23',
                'reregister_the_track_start' => '2023-08-23',
                'reregister_the_track_end' => '2023-08-23',
                'facebook_link' => 'https://www.facebook.com/Qeducato',
                'whatsapp_link' => 'https://www.whatsapp.com/Qeducato',
                'youtube_link' => 'https://www.whatsapp.com/Qeducato',
                'phone' => '+212 123-4567-901',
                'created_at' => Carbon::now(),
            ]
        ];

        DB::table('university_settings')->insert($data);
    }
}
