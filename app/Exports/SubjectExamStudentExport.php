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
    public function headings(): array
    {
        return [
            '#',
            'group Name in arabic',
            'group Name in english',
            'group Name in french',
            'department Name in arabic',
            'department Name in english',
            'department Name in french',
            'department branch Name in arabic',
            'department branch Name in english',
            'department branch Name in french',
            'User Code',
            'subject Name in arabic',
            'subject Name in english',
            'subject Name in french',
            'exam code',
            'section',
            'period',
            'session',
            'year',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $query = SubjectExamStudent::select('*')->get();
        $data = [];
        foreach ($query as $q) {
            $query_data = [
                'id' => $q->id,
                'group_ar' => $q->group->getTranslation('group_name','ar'),
                'group_en' => $q->group->getTranslation('group_name','en'),
                'group_fr' => $q->group->getTranslation('group_name','fr'),
                'department_ar' => $q->department->getTranslation('department_name','ar'),
                'department_en' => $q->department->getTranslation('department_name','en'),
                'department_fr' => $q->department->getTranslation('department_name','fr'),
                'department_branch_ar' => $q->departmentBranch->getTranslation('branch_name','ar'),
                'department_branch_en' => $q->departmentBranch->getTranslation('branch_name','en'),
                'department_branch_fr' => $q->departmentBranch->getTranslation('branch_name','fr'),
                'user_code' => (string) $q->user->identifier_id,
                'subject_name_ar' => $q->subject->getTranslation('subject_name','ar'),
                'subject_name_en' => $q->subject->getTranslation('subject_name','en'),
                'subject_name_fr' => $q->subject->getTranslation('subject_name','fr'),
                'exam_code' => (string) $q->exam_code,
                'section' => (string) $q->section,
                'period' => (string) $q->period,
                'session' => (string) $q->session,
                'year' => (string) $q->year,
            ];
            $data[] = $query_data;
        }

        return collect([$data]);

    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
        ];
    }

}
