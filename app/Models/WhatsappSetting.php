<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'otp_message',
        'api_key',
        'instance_id',
        'status',
    ];
}
