<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type', // withdrawal, commission, payout
        'status', // pending, completed, rejected
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
