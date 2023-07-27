<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\ProcessExam;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProcessImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('identifier_id','=', $rows[$i]['user_code'])->first('id');
            ProcessExam::Create([
                'user_id' => $user->id,
                'period' => $rows[$i]['period'],
                'year' => $rows[$i]['year'],
                'request_date' => $rows[$i]['request_date'],
                'request_status' => $rows[$i]['request_status'],
                'processing_request_date' => $rows[$i]['processing_request_date'],
                'reason' => $rows[$i]['reason'],
            ]);
        }
    }
}
