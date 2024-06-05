<?php

namespace App\Imports;

use App\Models\WhyChooseUs;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WhyChooseUsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new WhyChooseUs([
            'id' => $row['id'],
            'why_title' => $row['why_title'],
            'why_description' => $row['why_description'],
            'why_image' => $row['why_image'],
            'alt_tag' => $row['alt_tag'],
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
            'id' => 'nullable|integer',
            'why_title' => 'required',
            'why_description' => 'nullable',
            'why_image' => 'nullable',
            'alt_tag' => 'nullable',
            'status' => 'nullable',
        ];
    }
}
