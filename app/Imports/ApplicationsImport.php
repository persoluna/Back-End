<?php

namespace App\Imports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ApplicationsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Application([
            'application_title' => $row['application_title'],
            'application_description' => $row['application_description'],
            'application_image' => $row['application_image'],
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
            'application_title' => 'nullable',
            'application_description' => 'nullable',
            'application_image' => 'nullable',
            'alt_tag' => 'nullable',
        ];
    }
}
