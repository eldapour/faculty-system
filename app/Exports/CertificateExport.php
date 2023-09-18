<?php

namespace App\Exports;

use App\Models\Certificate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CertificateExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'Certificate Code',
            'User Code',
            'situation with management',
            'situation with treasury',
            'description situation with management (ar)',
            'description situation with management (en)',
            'description situation with management (fr)',
            'description situation with treasury (ar)',
            'description situation with treasury (en)',
            'description situation with treasury (fr)',
            'year',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $certificates = Certificate::get();

        $data = [];
        foreach ($certificates as $certificate) {
            $certificate_data = [
                'id' => $certificate->id,
                'Certificate Code' => (string) $certificate->certificateType->code,
                'User Code' => (string) $certificate->user->identifier_id,
                'situation with management' => (string) $certificate->situation_with_management,
                'situation with treasury' => (string) $certificate->situation_with_treasury,
                'description situation with management (ar)' => $certificate->getTranslation('description_situation_with_management','ar'),
                'description situation with management (en)' => $certificate->getTranslation('description_situation_with_management','en'),
                'description situation with management (fr)' => $certificate->getTranslation('description_situation_with_management','fr'),
                'description situation with treasury (ar)' => $certificate->getTranslation('description_situation_with_treasury','ar'),
                'description situation with treasury (en)' => $certificate->getTranslation('description_situation_with_treasury','en'),
                'description situation with treasury (fr)' => $certificate->getTranslation('description_situation_with_treasury','fr'),
                'year' => $certificate->year,
            ];
            $data[] = $certificate_data;
        }

//        dd($data);
        return collect([$data]);

    }

}
