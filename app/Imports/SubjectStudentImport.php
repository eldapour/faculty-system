<?php

namespace App\Imports;

use App\Models\Certificate;

use App\Models\Department;
use App\Models\DepartmentBranch;
use App\Models\DepartmentBranchStudent;
use App\Models\Group;
use App\Models\Subject;
use App\Models\SubjectExamStudent;
use App\Models\SubjectStudent;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SubjectStudentImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {

        for ($i = 0; $i < count($rows); $i++) {
            $user = User::where('user_type', '=', 'student')
                ->where('identifier_id','=', $rows[$i]['user_code'])->first('id');
            $subject = Subject::where('code','=', $rows[$i]['subject_code'])->first('id');

            SubjectStudent::updateOrcreate([
                'user_id' => $user->id,
                'subject_id' => $subject->id,
            ],[
                'user_id' => $user->id,
                'subject_id' => $subject->id,
                'period' =>  $rows[$i]['period'],
                'group_id' => $rows[$i]['group_id'],
                'year' => $rows[$i]['year'],
            ]);
        }
    }
}
