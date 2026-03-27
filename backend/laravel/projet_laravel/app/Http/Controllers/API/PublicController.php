<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationCampaign;
use App\Models\Appointment;
use App\Models\QRCode;

class PublicController extends Controller
{
    // Get Featured Campaigns (e.g., active and high priority)
    public function getFeaturedCampaigns()
    {
        return response()->json(DonationCampaign::where('is_active', true)->take(5)->get());
    }

    // Get All Campaigns (paginated)
    public function getAllCampaigns()
    {
        return response()->json(DonationCampaign::where('is_active', true)->paginate(10));
    }

    // Get Campaign Details by Slug
    public function getCampaignDetails($slug)
    {
        $campaign = DonationCampaign::where('slug', $slug)->firstOrFail();
        return response()->json($campaign);
    }

    // Process Blood Donation Appointment
    public function processDonation(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:donation_campaigns,id',
            'datetime' => 'required',
            'donation_center_id' => 'required|exists:donation_centers,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $campaign = DonationCampaign::findOrFail($request->campaign_id);

        // Split datetime into date and time
        $datetimeParts = explode('T', $request->datetime);
        $date = $datetimeParts[0];
        $time = isset($datetimeParts[1]) ? substr($datetimeParts[1], 0, 5) : '08:00';

        $appointment = Appointment::create([
            'donation_campaign_id' => $campaign->id,
            'donation_center_id' => $request->donation_center_id,
            'user_id' => $request->user_id ?? (auth('sanctum')->check() ? auth('sanctum')->id() : null),
            'appointment_date' => $date,
            'appointment_time' => $time,
            'status' => 'scheduled',
        ]);

        $qrData = 'BLOOD-APPT-' . $appointment->id . '-' . uniqid();

        $qrRecord = QRCode::create([
            'donation_campaign_id' => $campaign->id,
            'code_data' => $qrData,
            'file_path' => null 
        ]);

        $appointment->qr_code_path = $qrData;
        $appointment->save();

        return response()->json([
            'appointment' => $appointment,
            'qr_data' => $qrData
        ], 201);
    }
}
