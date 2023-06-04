<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
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
                    'category_name' => json_encode([
                        'ar' => 'كلية',
                        'en' => 'College',
                        'fr' => 'Collège',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'قسم',
                        'en' => 'Section',
                        'fr' => 'Section',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'التكوينات',
                        'en' => 'Configurations',
                        'fr' => 'Configurations',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'بحث',
                        'en' => 'Research',
                        'fr' => 'Recherche',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'الحياة الطلابية',
                        'en' => 'Student Life',
                        'fr' => 'Vie étudiante',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'مدونة',
                        'en' => 'Blog',
                        'fr' => 'Blog',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'تقدم الدراسة',
                        'en' => 'Study Progress',
                        'fr' => 'Progrès de l étude',
                    ])
                ],
                [
                    'category_name' => json_encode([
                        'ar' => 'الخدمات الرقمية',
                        'en' => 'Digital Services',
                        'fr' => 'Services numériques',
                    ])
                ],
            ];

            DB::table('categories')->insert($data);
    }


}
