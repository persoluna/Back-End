<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'Mission_title',
        'Mission_description',
        'Mission_image',
        'Mission_alt_tag',
        'vision_title',
        'vision_description',
        'vision_image',
        'vision_alt_tag',
        'Core_title',
        'Core_description',
        'Core_image',
        'Core_alt_tag',
    ];

}
