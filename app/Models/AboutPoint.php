<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
        'status',
    ];
}
