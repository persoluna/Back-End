<?php

namespace App\Imports;

use App\Models\Banner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BannersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Banner([
            'title' => $row['title'],
            'sub_title' => $row['sub_title'],
            'description' => $row['description'],
            'banner_image' => $row['banner_image'],
            'alt_tag' => $row['alt_tag'],
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
            'title' => 'required',
            'sub_title' => 'nullable',
            'description' => 'nullable',
            'banner_image' => 'nullable',
            'alt_tag' => 'nullable',
        ];
    }
}
