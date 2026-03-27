<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCode extends Model
{
    use HasFactory;

    protected $table = 'q_r_codes'; // Explicitly define table name if needed, though Laravel handles snake case well.

    protected $fillable = [
        'donation_campaign_id',
        'code_data',
        'file_path'
    ];

    public function campaign()
    {
        return $this->belongsTo(DonationCampaign::class, 'donation_campaign_id');
    }
}
