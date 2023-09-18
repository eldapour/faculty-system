<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
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
                        'ar' => 'هيكل الكلية',
                        'en' => 'College Structure',
                        'fr' => 'Ipsa repellendus L'
                    ]),
                    'description' => json_encode([
                        'ar' => '<p>هيكل الكلية</p>',
                        'en' => '<p>College Structure</p>',
                        'fr' => '<p>Ipsa repellendus L</p>',
                    ]),
                    'image' => 'assets/front/assets/photo/slider_bg_01.ac8b8779408287a47977.png',
                    'created_at' => Carbon::now(),
                ],
                [
                    'title' => json_encode([
                        'ar' => 'كيف حالك',
                        'en' => 'how are you',
                        'fr' => 'Sed sed est cum mini'
                    ]),
                    'description' => json_encode([
                        'ar' => '<p>كيف حالك</p>',
                        'en' => '<p>how are you</p>',
                        'fr' => '<p>Sed sed est cum mini</p>',
                    ]),
                    'image' => 'assets/front/assets/photo/slider_bg.6e3f0f1a1b58ac6d6c12.png',
                    'created_at' => Carbon::now(),
                ],
            ];
            DB::table('sliders')->insert($data);

    }
}
