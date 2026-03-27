<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUpdate;
use App\Models\DonationCampaign;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    // Public Feed
    public function index()
    {
        // Get updates from active campaigns, latest first
        $updates = ProjectUpdate::whereHas('campaign', function ($q) {
            $q->where('is_active', true);
        })->with('campaign')->latest()->paginate(10);

        return response()->json($updates);
    }

    // Beneficiary Post
    public function store(Request $request)
    {
        $request->validate([
            'donation_campaign_id' => 'required|exists:donation_campaigns,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Verify ownership
        $campaign = DonationCampaign::where('id', $request->donation_campaign_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $update = ProjectUpdate::create([
            'donation_campaign_id' => $campaign->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_url' => $request->input('image_url') // Simplified for now
        ]);

        return response()->json($update, 201);
    }
}
