<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\ProcessExam;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProcessImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
//        ProcessExam::select('*')->delete();
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('identifier_id','=', $rows[$i]['user_code'])->first('id');
//            dd(...);
            ProcessExam::where(['id' => $rows[$i]['id']])->update([
//                'user_id' => $user->id,
//                'period' => $rows[$i]['period'],
//                'year' => $rows[$i]['year'],
//                'request_date' => $rows[$i]['request_date'],
                'request_status' => $rows[$i]['request_status'],
                'processing_request_date' => $rows[$i]['processing_request_date'] ?? Carbon::now()->format('Y-m-d'),
//                'reason' => $rows[$i]['reason'],
            ]);
        }
    }
}
