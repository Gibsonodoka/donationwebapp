<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'support_area',
        'amount',
        'crypto_type',
        'wallet_address',
        'receipt_path',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
