<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdvertisementSeeder extends Seeder
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
                'title' => json_encode([
                    'ar' => 'مقصف جديد',
                    'en' => 'New canteen',
                    'fr' => 'Nouvelle cantine',
                ]),
                'description' => json_encode([
                    'ar' => 'فتح مقصف جديد في بناء الهندسة',
                    'en' => 'Open a new canteen in the engineering building',
                    'fr' => 'Ouvrir une nouvelle cantine dans le bâtiment d ingénierie',
                ]),
                'image' => 'assets/front/assets/photo/inner_b1.jpg',
                'background_image' => 'assets/front/assets/photo/inner_b2.jpg',
                'category_id' => 1,
                'service_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => json_encode([
                    'ar' => 'عميد جديد',
                    'en' => 'new dean',
                    'fr' => 'nouveau doyen',
                ]),
                'description' => json_encode([
                    'ar' => 'تم تعيين عميد جديد للكلية',
                    'en' => 'A new dean of the college has been appointed',
                    'fr' => 'Un nouveau doyen du collège a été nommé',
                ]),
                'image' => 'assets/front/assets/photo/inner_b3.jpg',
                'background_image' => 'assets/front/assets/photo/inner_b1.jpg',
                'category_id' => 2,
                'service_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'title' => json_encode([
                    'ar' => 'عميد جديد',
                    'en' => 'new dean',
                    'fr' => 'nouveau doyen',
                ]),
                'description' => json_encode([
                    'ar' => 'بطاقة جديدة',
                    'en' => 'new card',
                    'fr' => 'nouvelle carte',
                ]),
                'image' => 'assets/front/assets/photo/inner_b2.jpg',
                'background_image' => 'assets/front/assets/photo/inner_b1.jpg',
                'category_id' => 3,
                'service_id' => 3,
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('advertisements')->insert($data);
    }
}
