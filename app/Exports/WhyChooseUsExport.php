<?php

namespace App\Exports;

use App\Models\WhyChooseUs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WhyChooseUsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return WhyChooseUs::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "why_title", "why_description", "why_image", "alt_tag", "status", "created_at", "updated_at"];
    }
}
