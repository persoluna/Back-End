<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_title',
        'blog_slug',
        'short_description',
        'long_description',
        'blog_image',
        'alt_tag',
        'banner_image',
        'banner_alt_tag',
        'posted_by',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_canonical',
        'status',
    ];
}
