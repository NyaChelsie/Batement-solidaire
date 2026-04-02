<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    use HasFactory;

    protected $fillable = ['donation_campaign_id', 'title', 'content', 'image_url'];

    public function campaign()
    {
        return $this->belongsTo(DonationCampaign::class, 'donation_campaign_id');
    }
}
