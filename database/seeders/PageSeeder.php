<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PageSeeder extends Seeder
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
                    'fr' => 'Structure du Collège',
                ]),
                'description' => json_encode([
                    'ar' => 'هيكل الكلية',
                    'en' => 'College Structure',
                    'fr' => 'Structure du Collèg',
                ]),
                'category_id' => '1',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'مجلس التأسيس',
                    'en' => 'Foundation Board ',
                    'fr' => 'Conseil de fondation',
                ]),
                'description' => json_encode([
                    'ar' => 'مجلس التأسيس',
                    'en' => 'Foundation Board ',
                    'fr' => 'Conseil de fondation',
                ]),
                'category_id' => '1',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'جمعية الأعمال الاجتماعية',
                    'en' => 'Social Business Association',
                    'fr' => 'Association des entreprises sociales',
                ]),
                'description' => json_encode([
                    'ar' => 'جمعية الأعمال الاجتماعية',
                    'en' => 'Social Business Association',
                    'fr' => 'Association des entreprises sociales',
                ]),
                'category_id' => '1',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'قسم الاول',
                    'en' => 'Section One',
                    'fr' => 'Section un',
                ]),
                'description' => json_encode([
                    'ar' => 'قسم الاول',
                    'en' => 'Section One',
                    'fr' => 'Section un',
                ]),
                'category_id' => '2',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'قسم الثاني',
                    'en' => 'Section Two',
                    'fr' => 'Section un',
                ]),
                'description' => json_encode([
                    'ar' => 'قسم الثاني',
                    'en' => 'Section Two',
                    'fr' => 'Section deux',
                ]),
                'category_id' => '2',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'العطلة',
                    'en' => 'Holiday',
                    'fr' => 'Vacances',
                ]),
                'description' => json_encode([
                    'ar' => 'العطلة',
                    'en' => 'Holiday',
                    'fr' => 'Vacances',
                ]),
                'category_id' => '3',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'ماجستير',
                    'en' => 'Master',
                    'fr' => 'Maître',
                ]),
                'description' => json_encode([
                    'ar' => 'ماجستير',
                    'en' => 'Master',
                    'fr' => 'Maître',
                ]),
                'category_id' => '3',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'دكتور فى الفلسفة',
                    'en' => 'PHD',
                    'fr' => 'Doctorat',
                ]),
                'description' => json_encode([
                    'ar' => 'دكتور فى الفلسفة',
                    'en' => 'PHD',
                    'fr' => 'Doctorat',
                ]),
                'category_id' => '3',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'بحث',
                    'en' => 'Research',
                    'fr' => 'Recherche',
                ]),
                'description' => json_encode([
                    'ar' => 'بحث',
                    'en' => 'Research',
                    'fr' => 'Recherche',
                ]),
                'category_id' => '3',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'شراكة',
                    'en' => 'Partnership',
                    'fr' => 'Partenariat',
                ]),
                'description' => json_encode([
                    'ar' => 'شراكة',
                    'en' => 'Partnership',
                    'fr' => 'Partenariat',
                ]),
                'category_id' => '4',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'بحث',
                    'en' => 'Research',
                    'fr' => 'Recherche',
                ]),
                'description' => json_encode([
                    'ar' => 'بحث',
                    'en' => 'Research',
                    'fr' => 'Recherche',
                ]),
                'category_id' => '4',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'بنية البحث',
                    'en' => 'Search Structure',
                    'fr' => 'Structure de la recherche',
                ]),
                'description' => json_encode([
                    'ar' => 'بنية البحث',
                    'en' => 'Search Structure',
                    'fr' => 'Structure de la recherche',
                ]),
                'category_id' => '4',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'نوادي',
                    'en' => 'Clubs',
                    'fr' => 'Clubs',
                ]),
                'description' => json_encode([
                    'ar' => 'نوادي',
                    'en' => 'Clubs',
                    'fr' => 'Clubs',
                ]),
                'category_id' => '5',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'طلاب اجانب',
                    'en' => 'Foreign Students',
                    'fr' => 'Étudiants étrangers',
                ]),
                'description' => json_encode([
                    'ar' => 'طلاب اجانب',
                    'en' => 'Foreign Students',
                    'fr' => 'Étudiants étrangers',
                ]),
                'category_id' => '5',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'مؤسسة القانون الداخلي',
                    'en' => 'Institution Internal Law',
                    'fr' => 'Institution Droit interne',
                ]),
                'description' => json_encode([
                    'ar' => 'مؤسسة القانون الداخلي',
                    'en' => 'Institution Internal Law',
                    'fr' => 'Institution Droit interne',
                ]),
                'category_id' => '5',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'البرمجة السنوية',
                    'en' => 'Annual Programming',
                    'fr' => 'Programmation annuelle',
                ]),
                'description' => json_encode([
                    'ar' => 'البرمجة السنوية',
                    'en' => 'Annual Programming',
                    'fr' => 'Programmation annuelle',
                ]),
                'category_id' => '7',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'منصة الطالب الرقمية',
                    'en' => 'Digital Student Platform',
                    'fr' => 'Plateforme étudiante numérique',
                ]),
                'description' => json_encode([
                    'ar' => 'منصة الطالب الرقمية',
                    'en' => 'Digital Student Platform',
                    'fr' => 'Plateforme étudiante numérique',
                ]),
                'category_id' => '8',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'المنصة الرقمية للكليات',
                    'en' => 'Colleges Digital Platform',
                    'fr' => 'Plateforme numérique des collèges',
                ]),
                'description' => json_encode([
                    'ar' => 'المنصة الرقمية للكليات',
                    'en' => 'Colleges Digital Platform',
                    'fr' => 'Plateforme numérique des collèges',
                ]),
                'category_id' => '8',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
            [
                'title' => json_encode([
                    'ar' => 'مجلة الكليات الرقمية',
                    'en' => 'Colleges Digital Magazine',
                    'fr' => 'Magazine numérique des collèges',
                ]),
                'description' => json_encode([
                    'ar' => 'مجلة الكليات الرقمية',
                    'en' => 'Colleges Digital Magazine',
                    'fr' => 'Magazine numérique des collèges',
                ]),
                'category_id' => '8',
                'images' => json_encode([
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/evn-img-1.jpg",
                    "assets/front/assets/photo/evn-img-3.jpg",
                ]),
                'files' => json_encode([
                    "assets/front/assets/pdf/CamScanner 05-21-2023 11.40.pdf",
                    "assets/front/assets/pdf/file1.pdf",
                ])
            ],
        ];
        DB::table('pages')->insert($data);
    }
}
