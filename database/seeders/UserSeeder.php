<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'first_name' => 'علي',
            'last_name' => 'محمد',
            'image' => null,
            'university_email' => 'university@gmail.com',
            'identifier_id' => "375835838573",
            'national_id' => "8888390852345632",
            'national_number' => "78756735763476",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-10",
            'address' => "القاهره",
            'user_type' => "student",
            'university_register_year' => "2022",
            'email' => "islam123@gmail.com",
            'password' => Hash::make("123456"),

        ]);

        User::create([

            'first_name' => 'abdallah',
            'last_name' => 'mahmoud',
            'image' => null,
            'university_email' => null,
            'identifier_id' => null,
            'national_id' => null,
            'national_number' => null,
            'nationality' => null,
            'birthday_date' => null,
            'address' => null,
            'user_type' => "manger",
            'university_register_year' => null,
            'job_id' => null,
            'email' => "admin@admin.com",
            'password' => Hash::make("123456"),

        ]);

    }
}
