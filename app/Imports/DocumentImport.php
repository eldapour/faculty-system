<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\DepartmentBranch;
use App\Models\Document;
use App\Models\Element;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DocumentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            // get user data id
            $user = User::where('identifier_id','=', $rows[$i]['user_code'])->first('id');

            //declare Data rows
            $data[] = [
                'user_id' => $user->id,
                'document_type_id' => $rows[$i]['document_type_id'],
                'withdraw_by_proxy' => $rows[$i]['withdraw_by_proxy'],
                'person_name' => $rows[$i]['person_name'],
                'national_id_of_person' => $rows[$i]['national_id_of_person'],
                'request_date' => $rows[$i]['request_date'],
                'pull_type' => $rows[$i]['pull_type'],
                'pull_date' => $rows[$i]['pull_date'],
                'pull_return' => $rows[$i]['pull_return'],
                'request_status' => $rows[$i]['request_status'],
                'processing_request_date' => $rows[$i]['processing_request_date'],
            ];

            // create document loop
            Document::query()
                ->create([
                'user_id' => $data[$i]['user_id'],
                'document_type_id' => $data[$i]['document_type_id'],
                'withdraw_by_proxy' => $data[$i]['withdraw_by_proxy'],
                'person_name' => $data[$i]['person_name'],
                'national_id_of_person' => $data[$i]['national_id_of_person'],
                'request_date' => $data[$i]['request_date'],
                'pull_type' => $data[$i]['pull_type'],
                'pull_date' => $data[$i]['pull_date'],
                'pull_return' => $data[$i]['pull_return'],
                'request_status' => $data[$i]['request_status'],
                'processing_request_date' => $data[$i]['processing_request_date'],
            ]);
        }
    }
}
