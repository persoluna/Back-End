<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'metatagable_id',
        'metatagable_type',
        'title',
        'description',
        'canonical',
        'author',
        'language',
        'copyright',
        'content_type',
        'rating',
        'robots',
        'googlebot',
        'distribution',
        'schema',
        'viewport',
        'keywords',
        'revisit_after',
        'refresh',
        'og_title',
        'og_type',
        'og_url',
        'og_image',
        'og_description',
        'twitter_card',
        'twitter_site',
        'twitter_title',
        'twitter_description',
        'twitter_image',
    ];

    public function metatagable()
    {
        return $this->morphTo();
    }
}
