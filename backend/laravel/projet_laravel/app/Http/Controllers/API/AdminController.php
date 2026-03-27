<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DonationCampaign;
use App\Models\DonationTransaction;
use App\Models\Appointment;
use App\Models\BloodStock;

class AdminController extends Controller
{
    public function dashboardStats()
    {
        $totalUsers = User::count();
        $activeCampaigns = DonationCampaign::where('is_active', true)->count();
        $totalDonations = Appointment::where('status', 'completed')->count();

        $bloodStocks = \App\Models\BloodStock::all();

        return response()->json([
            'total_users' => $totalUsers,
            'active_campaigns' => $activeCampaigns,
            'total_completed_donations' => $totalDonations,
            'blood_stocks' => $bloodStocks
        ]);
    }

    // Get All Users (with filters)
    public function getUsers(Request $request)
    {
        $query = User::query();

        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        return response()->json($query->latest()->paginate(10));
    }

    // Delete User
    public function deleteUser($id)
    {
        if (auth()->id() == $id) {
            return response()->json(['message' => 'Cannot delete yourself'], 403);
        }
        User::findOrFail($id)->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    // Create Campaign
    public function createCampaign(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'urgency_level' => 'required|string|in:normale,urgente,critique',
            'blood_types_needed' => 'required|array',
            'expected_donors_count' => 'required|integer|min:1',
            'hospital' => 'nullable|string',
        ]);

        $campaign = DonationCampaign::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'urgency_level' => $validated['urgency_level'],
            'blood_types_needed' => $validated['blood_types_needed'],
            'expected_donors_count' => $validated['expected_donors_count'],
            'hospital' => $validated['hospital'] ?? 'Hôpital Général de Douala',
            'slug' => \Illuminate\Support\Str::slug($validated['title']) . '-' . uniqid(),
            'is_active' => true,
        ]);

        // Generate Campaign Link
        $campaignLink = config('app.frontend_url', 'http://localhost:5173') . '/campaign/' . $campaign->slug;

        return response()->json([
            'message' => 'Campagne créée avec succès',
            'campaign' => $campaign,
            'link' => $campaignLink
        ], 201);
    }

    // Get Campaigns (with filters)
    public function getCampaigns(Request $request)
    {
        $query = DonationCampaign::with('user');

        if ($request->has('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        return response()->json($query->paginate(10));
    }

    // Update Campaign (Approve/Suspend)
    public function updateCampaign(Request $request, $id)
    {
        $campaign = DonationCampaign::findOrFail($id);

        if ($request->has('is_active')) {
            $campaign->is_active = $request->is_active;
        }

        $campaign->save();
        return response()->json(['message' => 'Campaign updated', 'campaign' => $campaign]);
    }

    // Delete Campaign
    public function deleteCampaign($id)
    {
        DonationCampaign::findOrFail($id)->delete();
        return response()->json(['message' => 'Campaign deleted']);
    }

    // Get Appointments
    public function getAppointments(Request $request)
    {
        $query = Appointment::with(['donor', 'donationCenter']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->latest()->paginate(10));
    }

    // Get Blood Stocks
    public function getBloodStocks()
    {
        $stocks = BloodStock::all();
        return response()->json($stocks);
    }
}