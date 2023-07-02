<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectExamStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectExamStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
        $data = [];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id','=', $rows[$i]['user_code'])->first('id');

            $subject = Subject::where('code','=', $rows[$i]['subject_code'])->first('id');

            $data['user_id'] = $user->id;
            $data['subject_id'] = $subject->id;
            $data['exam_code'] = $rows[$i]['exam_code'];
            $data['section'] = $rows[$i]['section'];
            $data['period'] = $rows[$i]['period_rbyaayh_khryfyh'];
            $data['session'] = $rows[$i]['session_aaadyh_astdrakyh'];
            $data['year'] = $rows[$i]['year'];

            SubjectExamStudent::create([
                'user_id' => $data['user_id'],
                'subject_id' => $data['subject_id'],
                'exam_code' => $data['exam_code'],
                'section' => $data['section'],
                'period' => $data['period'],
                'session' => $data['session'],
                'year' => $data['year'],
            ]);
        }
    }
}
