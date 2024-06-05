<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Client::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function headings(): array
    {
        return ["id", "client_image", "alt_tag", "created_at", "updated_at"];
    }
}
