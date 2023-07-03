<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificateTypeSeeder extends Seeder
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
                'name' => json_encode([
                    'ar' => 'شهادة هندسة ميكانيك',
                    'en' => 'Mechanical engineering degree',
                    'fr' => 'Diplôme d ingénieur mécanique',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة هندسة حاسب',
                    'en' => 'Computer engineering degree',
                    'fr' => 'Diplôme d ingénieur en informatique',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة هندسة زراعة',
                    'en' => 'Agricultural engineering degree',
                    'fr' => 'Diplôme d ingénieur agronome',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة تجارة واقتصاد',
                    'en' => 'Business and economics certificate',
                    'fr' => 'Certificat de commerce et d économie',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة تربية',
                    'en' => 'Breeding certificate',
                    'fr' => 'Certificat délevage',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة هندسة ميكاترونكس',
                    'en' => 'Mechatronics Engineering Certificate',
                    'fr' => 'Certificat d ingénieur en mécatronique',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'شهادة هندسة بترول',
                    'en' => 'Petroleum engineering degree',
                    'fr' => 'Diplôme d ingénieur pétrolier',
                ]),
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('certificate_types')->insert($data);
    }
}
