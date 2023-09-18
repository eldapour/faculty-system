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
        // Document::select('*')->delete();
        for ($i = 0; $i < count($rows); $i++) {
            // get user data id
            $user = User::where('identifier_id','=', $rows[$i]['user_code'])->first('id');

            // create document loop
            Document::query()
                ->where('id', $rows[$i]['id'])->update([
                // 'user_id' => $user->id,
                // 'document_type_id' => $rows[$i]['document_type_id'],
                // 'withdraw_by_proxy' => $rows[$i]['withdraw_by_proxy'],
                // 'person_name' => $rows[$i]['person_name'],
                // 'national_id_of_person' => $rows[$i]['national_id_of_person'],
                'request_date' => $rows[$i]['request_date'],
                'pull_type' => $rows[$i]['pull_type'],
                'pull_date' => $rows[$i]['pull_date'],
                // 'pull_return' => $rows[$i]['pull_return'],
                'request_status' => $rows[$i]['request_status'],
                'processing_request_date' => $rows[$i]['processing_request_date'],
            ]);
        }
    }
}
