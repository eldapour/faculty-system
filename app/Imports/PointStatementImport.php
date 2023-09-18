<?php

namespace App\Imports;

use App\Models\Element;
use App\Models\PointStatement;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PointStatementImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows): void
    {
//        dd($rows);
        PointStatement::query()->select('*')->delete();

        for ($i = 0; $i < count($rows); $i++) {
            $user = User::query()
            ->where('user_type', '=', 'student')
                ->where('identifier_id', $rows[$i]['user_code'])->first('id');

            $element = Element::query()
                ->where('element_code', $rows[$i]['element_code'])->first('id');

            PointStatement::create([
                'user_id' =>$user->id,
                'element_id' => $element->id,
                'degree_student' =>$rows[$i]['student_degree'],
                'degree_element' =>$rows[$i]['element_degree'],
                'course' =>$rows[$i]['course'],
                'year' =>$rows[$i]['year'],
            ]);
        }
    }
}
