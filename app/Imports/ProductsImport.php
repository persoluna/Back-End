<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'id' => $row['id'],
            'category_id' => $row['category_id'],
            'subcategory_id' => $row['subcategory_id'],
            'product_name' => $row['product_name'],
            'slug' => $row['slug'],
            'description' => $row['description'],
            'image' => $row['image'],
            'alt_tag' => $row['alt_tag'],
            'meta_title' => $row['meta_title'],
            'meta_description' => $row['meta_description'],
            'meta_keyword' => $row['meta_keyword'],
            'meta_canonical' => $row['meta_canonical'],
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'product_name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
            'alt_tag' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable',
        ];
    }
}
