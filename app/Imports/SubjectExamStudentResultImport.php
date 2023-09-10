<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectExamStudentResultImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
//        dd($rows);
        SubjectExamStudentResult::select('*')->delete();

        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            $subject = Subject::query()
            ->where('code','=', $rows[$i]['subject_code'])->first('id');

            SubjectExamStudentResult::create([
                'user_id' =>$user->id,
                'subject_id' => $subject->id,
                'student_degree' =>$rows[$i]['student_degree'],
                'group_id' =>$rows[$i]['group_id'],
                'exam_degree' =>$rows[$i]['exam_degree'],
                'date_enter_degree' =>$rows[$i]['date_enter_degree'],
                'course' =>$rows[$i]['course_astdrakyh_aaadyh'],
                'year' =>$rows[$i]['year'],
            ]);
        }
    }
}
