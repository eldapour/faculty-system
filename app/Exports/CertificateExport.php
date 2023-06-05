<?php

namespace App\Exports;

use App\Models\Certificate;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class CertificateExport implements FromCollection, WithHeadings, WithColumnWidths

{

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 20,
            'F' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'diploma Name in arabic',
            'diploma Name in English',
            'diploma Name in french',
            'year',
            'User Code',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $certificate = Certificate::select('id', 'diploma_name', 'year', 'user_id')->get();
        $data = [];
        foreach ($certificate as $certificate) {
            $data = [
                'id' => $certificate->id,
                'diploma_name_ar' => $certificate->getTranslation('diploma_name', 'ar'),
                'diploma_name_en' => $certificate->getTranslation('diploma_name', 'en'),
                'diploma_name_fr' => $certificate->getTranslation('diploma_name', 'fr'),
                'year' => $certificate->year,
                'user' => $certificate->user->identifier_id,
            ];
        }

        return collect([$data]);

    }

}
