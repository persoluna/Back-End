<?php

namespace App\Imports;

use App\Models\blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BlogsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new blog([
            'id' => $row['id'],
            'blog_title' => $row['blog_title'],
            'blog_slug' => $row['blog_slug'],
            'short_description' => $row['short_description'],
            'long_description' => $row['long_description'],
            'blog_image' => $row['blog_image'],
            'alt_tag' => $row['alt_tag'],
            'banner_image' => $row['banner_image'],
            'banner_alt_tag' => $row['banner_alt_tag'],
            'posted_by' => $row['posted_by'],
            'meta_title' => $row['meta_title'],
            'meta_description' => $row['meta_description'],
            'meta_keywords' => $row['meta_keywords'],
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
            'blog_title' => 'required',
            'blog_slug' => 'required',
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'blog_image' => 'nullable',
            'alt_tag' => 'nullable',
            'banner_image' => 'nullable',
            'banner_alt_tag' => 'nullable',
            'posted_by' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_canonical' => 'nullable',
        ];
    }
}
