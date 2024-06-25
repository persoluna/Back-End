<?php

namespace App\Models;

use App\Models\blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function blogs(): HasMany
    {
        return $this->hasMany(blog::class, 'category_id');
    }
}
