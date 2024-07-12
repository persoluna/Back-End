<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\VideoCategory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'url', 'category_id'];

    /**
     * Get the category that owns the video.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(VideoCategory::class, 'category_id');
    }
}
