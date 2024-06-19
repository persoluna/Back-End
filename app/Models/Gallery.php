<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_names',
        'alt_tag',
    ];

    public function getFirstImageAttribute()
    {
        $images = json_decode($this->image_names, true);
        return $images ? $images[0] : null;
    }
}
