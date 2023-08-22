<?php

namespace App\Exports;

use App\Models\ProcessDegree;
use App\Models\ProcessExam;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProcessDegreeExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            'id',
            'user code',
            'period',
            'year',
            'request date',
            'request status',
            'request type',
            'processing date',
            'subject id',
            'doctor id',
            'exam code',
            'student degree before request',
            'student degree after request',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $processes = ProcessDegree::query()->get();

        $data = [];
        foreach ($processes as $process) {
            $process_data = [
              'id' => $process->id,
              'user_id' => $process->user->identifier_id,
              'period' => $process->period,
              'year' => $process->year,
              'request_date' => $process->request_date,
              'request_status' => $process->request_status,
              'request_type' => $process->request_type,
              'processing_date' => $process->processing_date,
              'subject_id' =>  $process->subject_id,
              'doctor_id' =>  $process->doctor_id,
              'exam_code' =>  $process->exam_code,
              'student_degree_before_request' =>  $process->student_degree_before_request,
              'student_degree_after_request' =>  $process->student_degree_after_request,
//              'reason' =>  $process->reason,
            ];
            $data[] = $process_data;
        }
        return collect([$data]);
    } // end collection
}
