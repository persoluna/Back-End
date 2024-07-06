<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_url',
        'editable_url',
        'priority',
        'frequency',
    ];
}
