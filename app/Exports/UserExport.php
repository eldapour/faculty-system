<?php

namespace App\Exports;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class UserExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'first name',
            'last name',
            'first name latin',
            'last name latin',
            'points',
            'university email',
            'identifier id',
            'national id',
            'national number',
            'nationality',
            'birthday date',
            'birthday place',
            'city ar',
            'city latin',
            'address',
            'country address ar',
            'country address latin',
            'university register year',
            'email',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $users = User::query()
            ->where('user_type', '=', 'student')
            ->get();

        $data = [];
        foreach ($users as $user) {
            $user_data = [
              'id' => $user->id,
              'first_name' => $user->first_name,
              'last_name' => $user->last_name,
              'first_name_latin' => $user->first_name_latin,
              'last_name_latin' => $user->last_name_latin,
              'points' => (string) $user->points,
              'university_email' => $user->university_email,
              'identifier_id' => $user->identifier_id,
              'national_id' => $user->national_id,
              'national_number' => $user->national_number,
              'nationality' => $user->nationality,
              'birthday_date' => $user->birthday_date,
              'birthday_place' => $user->birthday_place,
              'city_ar' => $user->city_ar,
              'city_latin' => $user->city_latin,
              'address' => $user->address,
              'country_address_ar' => $user->country_address_ar,
              'country_address_latin' => $user->country_address_latin,
              'university_register_year' => $user->university_register_year,
              'email' => $user->email,
            ];
            $data[] = $user_data;
        }
        return collect([$data]);
    } // end collection
}
