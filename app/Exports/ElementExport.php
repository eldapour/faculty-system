<?php

namespace App\Exports;

use App\Models\Certificate;
use App\Models\Element;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ElementExport implements FromCollection, WithHeadings, ShouldAutoSize

{
    public function headings(): array
    {
        return [
            '#',
            'name in arabic',
            'name in english',
            'name in french',
            'period',
            'department branch code',
        ];
    }

    /**
     * @return Collection
     */

    public function collection(): Collection

    {
        $elements = Element::query()->get();

        $data = [];
        foreach ($elements as $element) {
            $user_data = [
              'id' => $element->id,
                'name in arabic' => $element->getTranslation('name','ar'),
                'name in english' => $element->getTranslation('name','en'),
                'name in french' => $element->getTranslation('name','fr'),
                'period' => $element->period,
                'department branch id' => (string) $element->department_branch->department_branch_code,
            ];
            $data[] = $user_data;
        }
        return collect([$data]);
    } // end collection
}
