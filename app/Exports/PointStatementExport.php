<?php

namespace App\Exports;

use App\Models\PointStatement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PointStatementExport implements FromCollection, WithHeadings,ShouldAutoSize

{
    public function headings(): array
    {
        return [
<<<<<<< HEAD
            'user_code',
            'element_code',
            'student_degree',
            'element_degree',
=======
            '#',
            'user code',
            'element Id',
            'student degree',
            'element degree',
>>>>>>> e208e62a194a10a7f18324e702b94942bddaa85c
            'course',
            'year',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {

        $query = PointStatement::query()
        ->select('*')->get();
        $data = [];
        foreach ($query as  $q) {
            $query_data = [
<<<<<<< HEAD
                'user_code' => $q->user->identifier_id,
                'element_code' => $q->element_id,
                'student_degree' => $q->degree_student,
                'element_degree' => $q->degree_element,
=======
                '#' => $index+1,
                'user code' => $q->user->identifier_id,
                'element Id' => $q->element_id,
                'student degree' => $q->degree_student,
                'element degree' => $q->degree_element,
>>>>>>> e208e62a194a10a7f18324e702b94942bddaa85c
                'course' => $q->course,
                'year' => $q->year,
            ];
            $data[] = $query_data;
        }

//        dd($data);
        return collect([$data]);

    }


}
