<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationCampaign;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DonationCampaignController extends Controller
{
    public function index()
    {
        // Return campaigns for the authenticated user, or all logic depending on requirement
        // Assuming user is authenticated via Sanctum
        $user = Auth::user();
        $campaigns = DonationCampaign::where('user_id', $user ? $user->id : null)->get();
        // For development without Auth, maybe return all or handle accordingly.
        // If strict auth is not yet set up, just return all.
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        return response()->json($campaigns);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'target_amount' => 'required|numeric',
        ]);

        $slug = Str::slug($request->title) . '-' . Str::random(6);
        $secretCode = strtoupper(Str::random(10));

        $campaign = DonationCampaign::create([
            'user_id' => Auth::id(), // Nullable if no auth yet
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'target_amount' => $request->target_amount,
            'slug' => $slug,
            'secret_code' => $secretCode,
        ]);

        return response()->json($campaign, 201);
    }

    public function show($slug)
    {
        $campaign = DonationCampaign::where('slug', $slug)->firstOrFail();
        return response()->json($campaign);
    }
}
