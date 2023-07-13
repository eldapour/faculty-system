<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\CertificateType;
use App\Models\DepartmentBranch;
use App\Models\Element;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ElementImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            // get department data id
            $department_branch_id = DepartmentBranch::query()
                ->where('department_branch_code',$rows[$i]['department_branch_code'])
                ->first('id');

            //declare Data rows
            $data[] = [
                'name' => [
                    'ar' => $rows[$i]['name_in_arabic'],
                    'en' => $rows[$i]['name_in_english'],
                    'fr' => $rows[$i]['name_in_french'],
                ],
                'period' => $rows[$i]['period'],
                'department_branch_id' => $department_branch_id->id,
            ];

            // create elements loop
            Element::query()
                ->create([
                'name' => $data[$i]['name'],
                'period' => $data[$i]['period'],
                'department_branch_id' => $data[$i]['department_branch_id'],
            ]);
        }
    }
}
