<?php

namespace App\Exports;

use App\Models\Document;
use App\Models\ProcessExam;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DocumentExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            'id',
            'user code',
            'document_type_id',
            'withdraw_by_proxy',
            'person_name',
            'national_id_of_person',
            'request_date',
            'pull_type',
            'pull_date',
            'pull_return',
            'request_status',
            'processing_request_date',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $data_list = Document::query()->get();

        $data = [];
        foreach ($data_list as $value) {
            $data_lists = [
              'id' => $value->id,
              'user_id' => $value->user->identifier_id,
              'document_type_id ' => (string) $value->document_type_id,
              'withdraw_by_proxy' => (string) $value->withdraw_by_proxy,
              'person_name' => (string) $value->person_name,
              'national_id_of_person' => (string) $value->national_id_of_person,
              'request_date' => (string) $value->request_date,
              'pull_type' => (string) $value->pull_type,
              'pull_date' => (string) $value->pull_date,
              'pull_return' => (string) $value->pull_return,
              'request_status' => (string) $value->request_status,
              'processing_request_date' =>  (string) $value->processing_request_date,
            ];
            $data[] = $data_lists;
        }
        return collect([$data]);
    } // end collection
}
