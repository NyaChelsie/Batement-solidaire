<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\DonationCampaign;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'campaign_slug' => 'required|exists:donation_campaigns,slug',
            'amount' => 'required|numeric|min:1',
            'donor_name' => 'nullable|string',
        ]);

        $campaign = DonationCampaign::where('slug', $request->campaign_slug)->first();

        $donation = Donation::create([
            'donation_campaign_id' => $campaign->id,
            'donor_name' => $request->donor_name ?? 'Anonymous',
            'amount' => $request->amount,
            'message' => $request->message,
            'status' => 'pending', // Simulating pending
        ]);

        // Here you would integrate payment gateway logic

        return response()->json($donation, 201);
    }

    public function index($slug)
    {
        $campaign = DonationCampaign::where('slug', $slug)->firstOrFail();
        return response()->json($campaign->donations);
    }
}
