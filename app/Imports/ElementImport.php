<?php

namespace App\Imports;

use App\Models\Certificate;
use App\Models\CertificateType;
use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\Element;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ElementImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        Element::select('*')->delete();

        for ($i = 0; $i < count($rows); $i++) {
            $department = Department::query()
                ->where('department_code',$rows[$i]['department_code'])
                ->first();

            Element::create([
                    'element_code' => $rows[$i]['element_code'],
                    'name_ar' => $rows[$i]['name_ar'],
                    'name_latin' => $rows[$i]['name_latin'],
                    'session' => $rows[$i]['session'],
                    'department_id' => $department->id,
            ]);
        }
    }
}
