<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'slug',
        'banner_image',
        'alt_tag',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_canonical',
        'status',
    ];
}
