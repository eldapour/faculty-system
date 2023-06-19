<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReasonRedresseSeeder extends Seeder
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
                    'ar' => 'تأخر عن موعد الامتحان',
                    'en' => 'Being late for the exam',
                    'fr' => 'Être en retard à l examen',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'مرض',
                    'en' => 'Illness',
                    'fr' => 'maladie',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'حالة وفاة داخل الاسرة',
                    'en' => 'A death within the family',
                    'fr' => 'Un décès dans la famille',
                ]),
                'created_at' => Carbon::now(),
            ],
            [
                'name' => json_encode([
                    'ar' => 'حالات اجتماعية اخرة',
                    'en' => 'other social situations',
                    'fr' => 'autres situations sociales',
                ]),
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('reasons_redresses')->insert($data);
    }
}
