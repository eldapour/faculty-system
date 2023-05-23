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
            'identifier_id' => "37583583857",
            'national_id' => "8888390852345632",
            'national_number' => "78756735763476",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-10",
            'address' => "القاهره",
            'user_type' => "student",
            'university_register_year' => "2022",
            'job_id' => "6298752435",
            'email' => "islam123@gmail.com",
            'password' => Hash::make("123456"),

        ]);
    }
}
