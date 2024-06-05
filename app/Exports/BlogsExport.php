<?php

namespace App\Exports;

use App\Models\blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BlogsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return blog::all();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["id", "blog_title", "blog_slug", "short_description", "long_description", "blog_image", "alt_tag", "status", "banner_image", "banner_alt_tag", "posted_by", "meta_title", "meta_description", "meta_keywords", "meta_canonical", "created_at", "updated_at"];
    }
}
