<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'logo',
        'logo_alt_tag',
        'fav_icon',
        'icon_alt_tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_canonical',
    ];
}
