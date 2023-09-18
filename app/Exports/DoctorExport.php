<?php

namespace App\Exports;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DoctorExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'first name',
            'last name',
            'first name latin',
            'last name latin',
            'email',
            'job id',
            'professor_position',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $users = User::query()
            ->where('user_type', '=', 'doctor')
            ->get();

        $data = [];
        foreach ($users as $user) {
            $user_data = [
              'id' => $user->id,
              'first_name' => $user->first_name,
              'last_name' => $user->last_name,
              'first_name_latin' => $user->first_name_latin,
              'last_name_latin' => $user->last_name_latin,
              'email' =>  $user->email,
              'job_id' => $user->job_id,
              'professor_position' => $user->professor_position
            ];
            $data[] = $user_data;
        }
        return collect([$data]);
    } // end collection
}
