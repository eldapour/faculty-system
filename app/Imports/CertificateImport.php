<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CertificateImport implements ToCollection , WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        foreach ($rows as $key => $row)
        $diploma_name['ar'] = $row['diploma_name_in_arabic'];
        $user = User::where('identifier_id',$row['user_code'])->first();
        $diploma_name['en'] = $row['diploma_name_in_english'];
        $diploma_name['fr'] = $row['diploma_name_in_french'];
        {
            Certificate::create([
                'user_id' => $user->id,
                'diploma_name' => $diploma_name,
                'year' => $row['year'],
            ]);
        }
    }
}
