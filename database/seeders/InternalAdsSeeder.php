<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InternalAdsSeeder extends Seeder
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
                "title" => json_encode([
                    'ar' => 'كرة قدم',
                    'en' => 'Football',
                    'fr' => 'Football',
                ]),
                "description" => json_encode([
                    'ar' => 'نصف نهائي كرة القدم',
                    'en' => 'Football semi-final',
                    'fr' => 'Demi-finale de foot',
                ]),
                "date_ads" => "2023-02-05",
                "url_ads" => "https://www.youtube.com/",
                "status" => "show",
                "service_id" => 1,
                'created_at' => Carbon::now(),
            ],
            [
                "title" => json_encode([
                    'ar' => 'كرة السلة',
                    'en' => 'Basket-ball',
                    'fr' => 'Basket-ball',
                ]),
                "description" => json_encode([
                    'ar' => 'نصف نهائي كرة القدم',
                    'en' => 'Basketball semi-finals',
                    'fr' => 'Demi-finales de basket',
                ]),
                "date_ads" => "2023-03-05",
                "url_ads" => "https://www.facebook.com/",
                "status" => "show",
                "service_id" => 2,
                'created_at' => Carbon::now(),
            ],
            [
                "title" => json_encode([
                    'ar' => 'كرة الطائرة',
                    'en' => 'Volleyball',
                    'fr' => 'Volley-ball',
                ]),
                "description" => json_encode([
                    'ar' => 'نصف نهائي كرة القدم',
                    'en' => 'Volleyball semi-finals',
                    'fr' => 'Demi-finales de volley-ball',
                ]),
                "date_ads" => "2023-05-05",
                "url_ads" => "https://www.facebook.com/",
                "status" => "show",
                "service_id" => 3,
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('internal_ads')->insert($data);
    }
}
