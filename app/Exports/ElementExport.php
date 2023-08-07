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
            'element_code',
            'name_ar',
            'name_latin',
            'session',
            'department_code',
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
            $elementsCollect = [
              'id' => $element->id,
                'element_code' => $element->element_code,
                'name_ar' => $element->name_ar,
                'name_latin' => $element->name_latin,
                'session' => $element->session,
                'department_code' =>  $element->department->department_code,
            ];
            $data[] = $elementsCollect;
        }
        return collect([$data]);
    } // end collection
}
