<?php

namespace App\Exports;

use App\Models\ProcessExam;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProcessExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'user code',
            'period',
            'year',
            'request date',
            'request status',
            'processing request date',
            'reason',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $processes = ProcessExam::query()->get();

        $data = [];
        foreach ($processes as $process) {
            $process_data = [
              'id' => $process->id,
              'user_id' => $process->user->identifier_id,
              'period' => $process->period,
              'year' => $process->year,
              'request_date' => $process->request_date,
              'request_status' => $process->request_status,
              'processing_request_date' => $process->processing_request_date,
              'reason' =>  $process->reason,
            ];
            $data[] = $process_data;
        }
        return collect([$data]);
    } // end collection
}