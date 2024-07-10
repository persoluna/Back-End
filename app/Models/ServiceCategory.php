<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'alt_tag',
        'icon',
        'icon_alt_tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_canonical',
        'status',
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_id');
    }

    public function metaTags(): MorphMany
    {
        return $this->morphMany(MetaTag::class, 'metatagable');
    }
}
