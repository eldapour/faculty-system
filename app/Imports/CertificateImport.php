<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CertificateImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type','=','student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');
            $data[] = $user->id;
            $diploma_name['ar'] = $rows[$i]['diploma_name_in_arabic'];
            $diploma_name['en'] = $rows[$i]['diploma_name_in_english'];
            $diploma_name['fr'] = $rows[$i]['diploma_name_in_french'];
            Certificate::create([
                'user_id' => $data[$i],
                'diploma_name' => $diploma_name,
                'year' => $rows[$i]['year'],
            ]);
        }
    }
}
