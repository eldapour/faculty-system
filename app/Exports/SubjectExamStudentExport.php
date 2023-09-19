<?php

namespace App\Exports;

use App\Models\SubjectExamStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class SubjectExamStudentExport implements FromCollection, WithHeadings,ShouldAutoSize

{
    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            '#',
            'User Code',
            'exam code',
            'exam number',
            'section',
            'period (ربيعيه, خريفيه)',
            'session (عاديه, استدراكيه)',
            'year',
        ];
    }

    /**
     * @return Collection
     */
    public function collection(): Collection

    {
        $query = SubjectExamStudent::query()->select('*')->get();
        $data = [];
        foreach ($query as $q) {
            $query_data = [
                'id' => $q->id,
                'User Code' => (string) $q->user->identifier_id,
                'Exam Code' => (string) $q->subject_exam->exam_code,
                'Exam Number' => (string) $q->exam_number,
                'section' => (string) $q->section,
                'period' => (string) $q->period,
                'session' => (string) $q->session,
                'year' => (string) $q->year,
            ];
            $data[] = $query_data;
        }

        return collect([$data]);

    }
}
