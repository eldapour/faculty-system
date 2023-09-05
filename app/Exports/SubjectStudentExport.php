<?php

namespace App\Exports;

use App\Models\ProcessExam;
use App\Models\SubjectStudent;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SubjectStudentExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'user code',
            'year',
            'group_id',
            'subject code',
            'period',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $data_list = SubjectStudent::query()->get();

        $data = [];
        foreach ($data_list as $value) {
            $datas = [
              'id' => (string) $value->id,
              'user_id' => (string) $value->user->identifier_id,
              'year' => (string) $value->year,
              'group_id' => (string) $value->group_id,
              'subject_id' => (string) $value->subject->code,
              'period' => (string) $value->period,
            ];
            $data[] = $datas;
        }
        return collect([$data]);
    } // end collection
}
