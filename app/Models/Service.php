<?php
namespace App\Models;

use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
        'alt_tag',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_canonical',
        'status',
    ];

    public function servicecategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}