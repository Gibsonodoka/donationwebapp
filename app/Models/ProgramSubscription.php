<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'support_area',
        'contribution_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
