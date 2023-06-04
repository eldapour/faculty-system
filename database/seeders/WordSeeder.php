<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WordSeeder extends Seeder
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
                    'ar' => 'مرحبا',
                    'en' => 'hello',
                    'fr' => 'hello'
                ]),
                'description' => json_encode([
                    'ar' => 'كلمة العميد',
                    'en' => 'word',
                    'fr' => 'word',
                ]),
                'role' => json_encode([
                    'ar' => 'العميد',
                    'en' => 'amed',
                    'fr' => 'amed',
                ]),
                'image' => 'assets/front/assets/photo/about_img.png',
                'category_id' => '1',
                'created_at' => Carbon::now(),
            ]
        ];
        DB::table('words')->insert($data);
    }
}
