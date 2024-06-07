<?php

namespace App\Imports;

use App\Models\Testimonial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TestimonialsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Testimonial([
            'name' => $row['name'],
            'description' => $row['description'],
            'profile_image' => $row['profile_image'],
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
            'name' => 'required',
            'description' => 'nullable',
            'profile_image' => 'nullable',
            'alt_tag' => 'nullable',
        ];
    }
}
