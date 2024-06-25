<?php

namespace App\Exports;

use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubcategoriesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Subcategory::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return ["id", "category_id", "name", "slug", "image", "alt_tag", "meta_title", "meta_description", "meta_keyword", "meta_canonical", "status", "created_at", "updated_at"];
    }
}
