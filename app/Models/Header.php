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
        'meta_tags',
        'favicon_1',
        'favicon_2',
        'favicon_3',
        'favicon_4',
        'icon1_alt_tag',
        'icon2_alt_tag',
        'icon3_alt_tag',
        'icon4_alt_tag',
    ];
}
