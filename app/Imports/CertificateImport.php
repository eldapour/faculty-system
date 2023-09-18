<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CertificateImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        Certificate::select('*')->delete();
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');
            $certificateType = CertificateType::where('code', $rows[$i]['certificate_code'])->first('id');

            $data['user_id'] = $user->id;
            $data['certificate_type_id'] = $certificateType->id;
            $data['situation_with_management'] = $rows[$i]['situation_with_management'];
            $data['situation_with_treasury'] = $rows[$i]['situation_with_treasury'];
            $data['description_situation_with_management'] = [
                'ar' => $rows[$i]['description_situation_with_management_ar'],
                'en' => $rows[$i]['description_situation_with_management_en'],
                'fr' => $rows[$i]['description_situation_with_management_fr']
            ];
            $data['description_situation_with_treasury'] = [
                'ar' => $rows[$i]['description_situation_with_treasury_ar'],
                'en' => $rows[$i]['description_situation_with_treasury_en'],
                'fr' => $rows[$i]['description_situation_with_treasury_fr']
            ];
            $data['year'] = $rows[$i]['year'];

            Certificate::create([
                'user_id' => $data['user_id'],
                'certificate_type_id' => $data['certificate_type_id'],
                'situation_with_management' => $data['situation_with_management'],
                'situation_with_treasury' => $data['situation_with_treasury'],
                'description_situation_with_management' => $data['description_situation_with_management'],
                'description_situation_with_treasury' => $data['description_situation_with_treasury'],
                'year' => $data['year'],
            ]);
        }
    }
}
