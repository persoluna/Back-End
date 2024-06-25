<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_letter',
        'instagram_link',
        'facebook_link',
        'google_link',
        'location',
        'phone',
        'phone2',
        'email',
        'email2',
        'address',
        'logo',
        'alt_tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_canonical',
    ];
}
