<?php

namespace App\Models;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'category_id');
    }
}
