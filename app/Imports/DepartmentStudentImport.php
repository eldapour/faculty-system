<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranchStudent;
use App\Models\DepartmentStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DepartmentStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type','=','student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            $department = Department::where('department_code', $rows[$i]['department_code'])
                ->first('id');

            $year = $rows[$i]['year'];
            $period = $rows[$i]['period_rbyaayhkhryfyh'];
            $confirm = $rows[$i]['confirm_01'];
            DepartmentStudent::query()
            ->updateOrcreate([
                'user_id' => $user->id,
                'year' => $year,
                'period' => $period,
                'department_id' => $department->id,
            ],[
                'user_id' => $user->id,
                'year' => $year,
                'period' => $period,
                'department_id' => $department->id,
                'confirm_request' => $confirm,
            ]);
        }
    }
}
