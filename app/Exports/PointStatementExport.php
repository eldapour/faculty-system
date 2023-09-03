<?php

namespace App\Exports;

use App\Models\PointStatement;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class PointStatementExport implements FromCollection, WithHeadings,ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'user code',
            'element code',
            'student degree',
            'element degree',
            'course (عاديه , استدراكيه)',
            'year',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $query = PointStatement::select('*')->get();
        $data = [];
        foreach ($query as $index => $q) {
            $query_data = [
                '#' => $index+1,
                'user code' => $q->user->identifier_id,
                'element code' => $q->element_code,
                'student degree' => $q->degree_student,
                'element degree' => $q->degree_element,
                'period (ربيعيه , خريفيه)' => $q->period,
                'year' => $q->year,
            ];
            $data[] = $query_data;
        }

        return collect([$data]);

    }
}
