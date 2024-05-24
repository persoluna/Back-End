<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image1',
        'alt_tag1',
        'image2',
        'alt_tag2',
        'owner_name',
        'owner_designation',
        'owner_signature',
        'alt_tag3',
    ];
}
