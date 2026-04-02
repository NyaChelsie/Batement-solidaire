<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'icon', 'description', 'color'];

    public function campaigns()
    {
        return $this->hasMany(DonationCampaign::class);
    }
}
