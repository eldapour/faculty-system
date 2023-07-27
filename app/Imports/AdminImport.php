<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class AdminImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $data[] = [
                'first_name' => $rows[$i]['first_name'],
                'last_name' => $rows[$i]['last_name'],
                'first_name_latin' => $rows[$i]['first_name_latin'],
                'last_name_latin' => $rows[$i]['last_name_latin'],
                'email' => $rows[$i]['email'],
                'job_id' => $rows[$i]['job_id'],
            ];

            User::where('user_type','employee')->updateOrCreate([
                'email' => $rows[$i]['email'],
            ],[
                'first_name' => $rows[$i]['first_name'],
                'last_name' => $rows[$i]['last_name'],
                'first_name_latin' => $rows[$i]['first_name_latin'],
                'last_name_latin' => $rows[$i]['last_name_latin'],
                'email' => $rows[$i]['email'],
                'password' => Hash::make('123456'),
                'job_id' => $rows[$i]['job_id'],
                'user_status' => 'active',
                'user_type' => 'employee',
            ]);
        }
    }
}