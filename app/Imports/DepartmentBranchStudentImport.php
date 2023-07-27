<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\DepartmentBranchStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DepartmentBranchStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type','=','student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');
            $register_year = $rows[$i]['register_year'];
            $branch_restart_register = $rows[$i]['branch_restart_register_01'];
            $department_branch_id = $rows[$i]['department_branch_id'];
            DepartmentBranchStudent::create([
                'user_id' => $user->id,
                'register_year' => $register_year,
                'branch_restart_register' => $branch_restart_register,
                'department_branch_id' => $department_branch_id,
            ]);
        }
    }
}
