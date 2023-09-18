<?php

namespace App\Exports;

use App\Models\DepartmentBranchStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class DepartmentBranchStudentExport implements FromCollection, WithHeadings, WithColumnWidths

{

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'register year',
            'branch restart register (0,1)',
            'User Code',
            'department_branch_id',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $query = DepartmentBranchStudent::select('*')->get();
        $data = [];
        foreach ($query as $q) {
            $query_data = [
                'id' => $q->id,
                'register_year' => (string) $q->register_year,
                'branch_restart_register' =>(string) $q->branch_restart_register,
                'user' =>  $q->student->identifier_id,
                'department_branch_id' => (string) $q->department_branch_id,
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
