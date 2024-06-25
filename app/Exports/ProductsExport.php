<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return ["id", "category_id", "subcategory_id", "product_name", "slug", "description", "image", "alt_tag", "meta_title", "meta_description", "meta_keyword", "meta_canonical", "status", "created_at", "updated_at"];
    }
}
