<?php

namespace App\Imports;

use App\Models\Counter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CountersImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Counter([
            'title' => $row['title'],
            'number' => $row['number'],
            'icon' => $row['icon'],
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
            'title' => 'required',
            'number' => 'nullable',
            'icon' => 'nullable',
            'alt_tag' => 'nullable',
            'status' => 'required',
        ];
    }

}
