<?php

use Illuminate\Support\Facades\Route;
use App\Models\DonationCampaign;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/share/campaign/{slug}', function ($slug) {
    if (!$slug) return redirect('/');
    $campaign = DonationCampaign::where('slug', $slug)->firstOrFail();
    return view('share', compact('campaign'));
});
