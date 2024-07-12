<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VideoCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the videos for the category.
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class, 'category_id');
    }
}
