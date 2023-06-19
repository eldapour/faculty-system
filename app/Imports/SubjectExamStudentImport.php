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
    public function collection(Collection $rows)
    {
        // data
        $data = [];
        $rows[0]['subject_name_in_english'];
        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            $subject = Subject::where('subject_name', 'like', '%' . $rows[$i]['subject_name_in_english'] . '%')
                ->select('id')
                ->first();
            $branch = DepartmentBranch::where('branch_name', 'like', '%' . $rows[$i]['department_branch_name_in_english'] . '%')
                ->select('id')
                ->first();
            $group = Group::where('group_name', 'like', '%' . $rows[$i]['group_name_in_english'] . '%')
                ->select('id')
                ->first();
            $department = Department::where('department_name', 'like', '%' . $rows[$i]['department_name_in_english'] . '%')
                ->select('id')
                ->first();


            $data['user'] = $user->id;
            $data['subject'] = $subject->id;
            $data['branch'] = $branch->id;
            $data['group'] = $group->id;
            $data['department'] = $department->id;
            $data['exam_code'] = $rows[$i]['exam_code'];
            $data['section'] = $rows[$i]['section'];
            $data['period'] = $rows[$i]['period'];
            $data['session'] = $rows[$i]['session'];
            $data['year'] = $rows[$i]['year'];

            SubjectExamStudent::create([
                'user_id' => $data['user'],
                'subject_id' => $data['subject'],
                'department_branch_id' => $data['branch'],
                'exam_code' => $data['exam_code'],
                'section' => $data['section'],
                'period' => $data['period'],
                'session' => $data['session'],
                'year' => $data['year'],
                'group_id' => $data['group'],
                'department_id' => $data['department'],
            ]);
        }
    }
}
