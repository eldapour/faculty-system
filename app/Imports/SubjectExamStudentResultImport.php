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
        $data = [];

        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            $data['user_id'] = $user->id;
            $data['subject_id'] = $rows[$i]['subject_id'];
            $data['student_degree'] = $rows[$i]['student_degree'];
            $data['exam_degree'] = $rows[$i]['exam_degree'];
            $data['date_enter_degree'] = $rows[$i]['date_enter_degree'];
            $data['period'] = $rows[$i]['period_rbyaayh_khryfyh'];
            $data['year'] = $rows[$i]['year'];

            SubjectExamStudentResult::create([
                'user_id' =>$data['user_id'],
                'subject_id' =>$data['subject_id'],
                'student_degree' =>$data['student_degree'],
                'exam_degree' =>$data['exam_degree'],
                'date_enter_degree' =>$data['date_enter_degree'],
                'period' =>$data['period'],
                'year' =>$data['year'],
            ]);
        }
    }
}
