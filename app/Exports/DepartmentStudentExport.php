<?php

namespace App\Exports;

use App\Models\DepartmentBranchStudent;
use App\Models\DepartmentStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class DepartmentStudentExport implements FromCollection, WithHeadings, ShouldAutoSize

{

    public function headings(): array
    {
        return [
            '#',
            'User Code',
            'department code',
            'period (ربيعيه,خريفيه)',
            'year',
            'confirm (0,1)',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $query = DepartmentStudent::select('*')->get();
        $data = [];
        foreach ($query as $q) {
            $query_data = [
                'id' => $q->id,
                'User Code' => (string) $q->user->identifier_id,
                'department code' => (string) $q->department->department_code,
                'period' => (string) $q->period,
                'year' => (string) $q->year,
                'confirm' => (string) $q->confirm_request,
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
