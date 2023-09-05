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
            'user_code',
            'element_code',
            'student_degree',
            'element_degree',
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
                'user_code' => $q->user->identifier_id,
                'element_code' => $q->element_id,
                'student_degree' => $q->degree_student,
                'element_degree' => $q->degree_element,
                'course' => $q->course,
                'year' => $q->year,
            ];
            $data[] = $query_data;
        }

//        dd($data);
        return collect([$data]);

    }


}
