<?php

namespace App\Models;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BannerCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function banners(): HasMany
    {
        return $this->hasMany(Banner::class, 'category_id');
    }
}