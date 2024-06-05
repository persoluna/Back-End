<?php

namespace App\Imports;

use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubcategoriesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Subcategory([
            'category_id' => $row['category_id'],
            'name' => $row['name'],
            'slug' => $row['slug'],
            'image' => $row['image'],
            'alt_tag' => $row['alt_tag'],
            'meta_title' => $row['meta_title'],
            'meta_description' => $row['meta_description'],
            'meta_keyword' => $row['meta_keyword'],
            'meta_canonical' => $row['meta_canonical'],
            'status' => $row['status'],
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
            'category_id' => 'required|integer',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'nullable',
            'alt_tag' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_canonical' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
