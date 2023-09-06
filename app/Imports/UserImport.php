<?php

namespace App\Imports;
use App\Models\Certificate;
use App\Models\CertificateType;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {

        for ($i = 0; $i < count($rows); $i++) {

            User::updateOrCreate([
                'id' => $rows[$i]['id'],
            ],[
                'first_name' => $rows[$i]['first_name'],
                'last_name' => $rows[$i]['last_name'],
                'first_name_latin' => $rows[$i]['first_name_latin'],
                'last_name_latin' => $rows[$i]['last_name_latin'],
                'points' => $rows[$i]['points'],
                'university_email' => $rows[$i]['university_email'],
                'identifier_id' => $rows[$i]['identifier_id'],
                'national_id' => $rows[$i]['national_id'],
                'national_number' => $rows[$i]['national_number'],
                'nationality' => $rows[$i]['nationality'],
                'birthday_date' => $rows[$i]['birthday_date'],
                'birthday_place' => $rows[$i]['birthday_place'],
                'city_ar' => $rows[$i]['city_ar'],
                'city_latin' => $rows[$i]['city_latin'],
                'address' => $rows[$i]['address'],
                'country_address_ar' => $rows[$i]['country_address_ar'],
                'country_address_latin' => $rows[$i]['country_address_latin'],
                'university_register_year' => $rows[$i]['university_register_year'],
                'email' => $rows[$i]['email'],
                'user_type' => 'student',
                'user_status' => $rows[$i]['user_status'],
                'student_type_id' => $rows[$i]['student_type']
            ]);
        }
    }
}
