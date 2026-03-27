<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'donation_center_id',
        'donation_campaign_id',
        'appointment_date',
        'appointment_time',
        'status',
        'qr_code_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donationCenter()
    {
        return $this->belongsTo(DonationCenter::class);
    }
}
