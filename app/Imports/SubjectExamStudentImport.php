<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectExam;
use App\Models\SubjectExamStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectExamStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {

        SubjectExamStudent::query()->select('*')->delete();
        for ($i = 0; $i < count($rows); $i++) {

            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id','=', $rows[$i]['user_code'])->first('id');

            $subject_exam = SubjectExam::query()->where('exam_code','=', $rows[$i]['exam_code'])->first('id');

            SubjectExamStudent::create([
                'user_id' => $user->id,
                'subject_exam_id' => $subject_exam->id,
                'exam_number' => $rows[$i]['exam_number'],
                'section' => $rows[$i]['section'],
                'period' => $rows[$i]['period_rbyaayh_khryfyh'],
                'session' => $rows[$i]['session_aaadyh_astdrakyh'],
                'year' => $rows[$i]['year'],
            ]);
        }
    }
}
