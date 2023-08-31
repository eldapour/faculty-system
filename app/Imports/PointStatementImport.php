<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Group;
use App\Models\PointStatement;
use App\Models\Subject;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PointStatementImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
//        dd($rows);
        PointStatement::select('*')->delete();
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            PointStatement::create([
                'user_id' =>$user->id,
                'element_code' =>$rows[$i]['element_code'],
                'degree_student' =>$rows[$i]['student_degree'],
                'degree_element' =>$rows[$i]['element_degree'],
                'course' =>$rows[$i]['course_aaadyh_astdrakyh'],
                'year' =>$rows[$i]['year'],
            ]);
        }
    }
} // end class
