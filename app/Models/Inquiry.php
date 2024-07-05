<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $table = 'user_inquiries';

    protected $fillable = [
      'name',
      'user_ip',
      'mobile_number',
      'email',
      'message',
      'companyName',
      'city',
      'pinCode',
      'utm_source',
      'utm_medium',
      'utm_campaign',
      'utm_id',
      'gclid',
      'gcid_source',
      'is_GPM',
    ];

    protected $casts = [
        'is_GPM' => 'boolean',
    ];

    public function scopeGpm($query)
    {
        return $query->where('is_GPM', true);
    }

    public function scopeSeo($query)
    {
        return $query->where('is_GPM', false);
    }
}