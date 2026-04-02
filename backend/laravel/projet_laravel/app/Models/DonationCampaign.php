<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'urgency_level',
        'blood_types_needed',
        'expected_donors_count',
        'hospital',
        'slug',
        'secret_code',
        'qr_code_path',
        'is_active',
        'objective_id'
    ];

    protected $casts = [
        'blood_types_needed' => 'array',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
