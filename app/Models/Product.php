<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'product_name',
        'slug',
        'description',
        'image',
        'alt_tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_canonical',
        'status',
        'meta_tags',
        'benefit_ids',
    ];

    protected $casts = [
        'benefit_ids' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function metaTags(): MorphMany
    {
        return $this->morphMany(MetaTag::class, 'metatagable');
    }
}
