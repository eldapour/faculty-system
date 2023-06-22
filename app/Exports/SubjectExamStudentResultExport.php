<?php

namespace App\Exports;

use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class SubjectExamStudentResultExport implements FromCollection, WithHeadings,ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'user code',
            'subject Id',
            'student degree',
            'exam degree',
            'date enter degree',
            'period (ربيعيه , خريفيه)',
            'year',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $query = SubjectExamStudentResult::select('*')->get();
        $data = [];
        foreach ($query as $q) {
            $query_data = [
                '#' => $q->id,
                'user code' => $q->user->identifier_id,
                'subject Id' => $q->subject_id,
                'student degree' => $q->student_degree,
                'exam degree' => $q->exam_degree,
                'date enter degree' => $q->date_enter_degree,
                'period' => $q->period,
                'year' => $q->year,
            ];
            $data[] = $query_data;
        }

        return collect([$data]);

    }
}
