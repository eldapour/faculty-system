<?php

namespace Database\Seeders;

use App\Models\StudentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentType::create([

            'student_type' => json_encode([
                "ar" => "طلبة ماستر", "en" => "Master's students", "fr" => "Étudiants en master"
                ]),
            'notes' => '',
        ]);

        StudentType::create([

            'student_type' => json_encode([
                "ar" => "طلبة إجازة", "en" => "vacation students", "fr" => "étudiants en vacances"
                ]),
            'notes' => 'طلبة إجازة',
        ]);
    }
}
