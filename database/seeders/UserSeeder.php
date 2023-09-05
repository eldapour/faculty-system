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

        //admins
        User::create([
            'first_name' => 'عبد الله',
            'last_name' => 'محمود',
            'first_name_latin' => 'Abdullah',
            'last_name_latin' => 'Mahmoud',
            'image' => 'avatar2.jfif',
            'email' => "admin@admin.com",
            'password' => Hash::make("123456"),
            'user_type' => "employee",
            'job_id' => 5345345345,

        ]);


        User::create([
            'first_name' => 'عميد.احمد',
            'last_name' => 'سعد',
            'first_name_latin' => 'Ahmed',
            'last_name_latin' => 'Saad',
            'image' => 'avatar2.jfif',
            'email' => "ahmedsaad123@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "manger",

        ]);
        //1,2


        //students
        User::create([
            'first_name' => 'اسلام',
            'last_name' => 'محمد',
            'first_name_latin' => 'Islam',
            'last_name_latin' => 'Mohamed',
            'image' => 'avatar2.jfif',
            'email' => "islam123@gmail.com",
            'password' => Hash::make("123456"),
            'university_email' => 'eslamuniversity@gmail.com',
            'identifier_id' => "119000601",
            'national_id' => "111222333444555",
            'national_number' => "77711122290",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-10",
            'birthday_place' => "الحامول",
            'city_ar' => "منوف",
            'city_en' => "Menouf",
            'address' => "القاهره",
            'country_address_ar' => "مصر",
            'country_address_latin' => "Cairo",
            'student_type_id' => 2,
            'user_type' => "student",
            'university_register_year' => "2023",

        ]);


        User::create([

            'first_name' => 'جمال',
            'last_name' => 'محمد',
            'first_name_latin' => 'Gamal',
            'last_name_latin' => 'Mohamed',
            'image' => 'avatar2.jfif',
            'email' => "gamal@gmail.com",
            'password' => Hash::make("123456"),
            'university_email' => 'gamal123university@gmail.com',
            'identifier_id' => "119000602",
            'national_id' => "111222333444000",
            'national_number' => "77711122210",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-15",
            'birthday_place' => "الحامول",
            'city_ar' => "منوف",
            'city_en' => "Menouf",
            'address' => "القاهره",
            'country_address_ar' => "مصر",
            'country_address_latin' => "Cairo",
            'student_type_id' => 2,
            'user_type' => "student",
            'university_register_year' => "2023",

        ]);


        User::create([

            'first_name' => 'عبد الله',
            'last_name' => 'محمد',
            'first_name_latin' => 'Abdullah',
            'last_name_latin' => 'Mohamed',
            'image' => 'avatar2.jfif',
            'email' => "Abdullah1098@gmail.com",
            'password' => Hash::make("123456"),
            'university_email' => 'Abdullah1098university@gmail.com',
            'identifier_id' => "119000603",
            'national_id' => "11122233344709",
            'national_number' => "77711122110",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-20",
            'birthday_place' => "الحامول",
            'city_ar' => "منوف",
            'city_en' => "Menouf",
            'address' => "القاهره",
            'country_address_ar' => "مصر",
            'country_address_latin' => "Cairo",
            'student_type_id' => 2,
            'user_type' => "student",
            'university_register_year' => "2023",

        ]);


        User::create([

            'first_name' => 'السيد',
            'last_name' => 'علي',
            'first_name_latin' => 'Elsayed',
            'last_name_latin' => 'Ali',
            'image' =>'avatar2.jfif',
            'email' => "ElsayedAli1098@gmail.com",
            'password' => Hash::make("123456"),
            'university_email' => 'ElsayedAli1098university@gmail.com',
            'identifier_id' => "119000604",
            'national_id' => "11122233344701",
            'national_number' => "77711122111",
            'nationality' => "مصري",
            'birthday_date' => "2000-06-20",
            'birthday_place' => "الحامول",
            'city_ar' => "منوف",
            'city_en' => "Menouf",
            'address' => "القاهره",
            'country_address_ar' => "مصر",
            'country_address_latin' => "Cairo",
            'student_type_id' => 2,
            'user_type' => "student",
            'university_register_year' => "2023",

        ]);

        //3,4,5,6


        //doctors
        User::create([
            'first_name' => 'كتور.رفعت',
            'last_name' => 'اسماعيل',
            'first_name_latin' => 'Refaat',
            'last_name_latin' => 'Esmail',
            'image' => 'avatar2.jfif',
            'email' => "Refaat@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 3333333,

        ]);

        User::create([
            'first_name' => 'دكتور.محمد',
            'last_name' => 'جابر',
            'first_name_latin' => 'Mohamed',
            'last_name_latin' => 'Gaber',
            'image' => 'avatar2.jfif',
            'email' => "MohamedGaber@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 22222090,

        ]);


        User::create([
            'first_name' => 'دكتور.امجد',
            'last_name' => 'السيد',
            'first_name_latin' => 'Amgad',
            'last_name_latin' => 'Elsayed',
            'image' => 'avatar2.jfif',
            'email' => "Amagad1234@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 222712309,

        ]);


        User::create([
            'first_name' => 'دكتور.عثمان',
            'last_name' => 'السيد',
            'first_name_latin' => 'Osman',
            'last_name_latin' => 'Elsayed',
            'image' => 'avatar2.jfif',
            'email' => "OsmanElsayed12345@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 629008761,

        ]);


        User::create([
            'first_name' => 'دكتور.سيد',
            'last_name' => 'عادل',
            'first_name_latin' => 'Sayed',
            'last_name_latin' => 'Adel',
            'image' => 'avatar2.jfif',
            'email' => "SayedAdel76100@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 22209098,

        ]);


        User::create([
            'first_name' => 'دكتور.شادي',
            'last_name' => 'جمال',
            'first_name_latin' => 'Shady',
            'last_name_latin' => 'Gamal',
            'image' => 'avatar2.jfif',
            'email' => "ShadyGamal222098@gmail.com",
            'password' => Hash::make("123456"),
            'user_type' => "doctor",
            'professor_position' => "professor_position",
            'job_id' => 9912098,
        ]);


        //7,8,9,10,11


    }
}
