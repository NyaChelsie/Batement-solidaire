<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationCampaign;
use App\Models\Appointment;
use App\Models\QRCode;

class PublicController extends Controller
{
    // Get Active Emergency (for Homepage Banner)
    public function getActiveEmergency()
    {
        $campaign = DonationCampaign::where('is_active', true)
            ->whereIn('urgency_level', ['critique', 'urgente'])
            ->orderByRaw("FIELD(urgency_level, 'critique', 'urgente')")
            ->latest()
            ->first();

        if ($campaign) {
            return response()->json($campaign);
        }

        return response()->json(['message' => 'Aucune urgence active'], 404);
    }

    public function getCenters()
    {
        return response()->json(\App\Models\DonationCenter::all());
    }

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
            'donation_center_id' => 'required',
            'datetime' => 'nullable',
            
            // New Fast-Track fields
            'guest_name' => 'nullable|string',
            'guest_phone' => 'nullable|string',
            'guest_blood_type' => 'nullable|string',
            'time_slot' => 'nullable|string',
        ]);

        $campaign = DonationCampaign::findOrFail($request->campaign_id);
        
        $userId = auth('sanctum')->check() ? auth('sanctum')->id() : null;

        // FAST-TRACK LOGIC
        if (!$userId && $request->filled('guest_phone')) {
            $user = \App\Models\User::where('phone', $request->guest_phone)->first();
            
            if (!$user) {
                if (!$request->filled('guest_name')) {
                    return response()->json(['message' => 'Le nom est requis pour confirmer.'], 400);
                }
                $user = \App\Models\User::create([
                    'name' => $request->guest_name,
                    'phone' => $request->guest_phone,
                    'blood_type' => $request->guest_blood_type ?? 'Inconnu',
                    'email' => 'guest_' . uniqid() . '@batement.local',
                    'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(12)),
                    'role' => 'donateur'
                ]);
            }
            $userId = $user->id;
        }

        // Parse Date/Time
        $date = date('Y-m-d'); // Default to today for Fast-Track
        $time = '12:00';
        
        if ($request->filled('datetime')) {
            $datetimeParts = explode('T', $request->datetime);
            $date = $datetimeParts[0];
            $time = isset($datetimeParts[1]) ? substr($datetimeParts[1], 0, 5) : '08:00';
        } else if ($request->filled('time_slot')) {
            // "Maintenant", "Ce Matin", "Cet Après-Midi"
            if ($request->time_slot === 'Maintenant') {
                $time = date('H:i', strtotime('+1 hour'));
            } else if ($request->time_slot === 'Ce matin') {
                $time = '09:00';
            } else {
                $time = '14:00';
            }
        }

        $appointment = Appointment::create([
            'donation_campaign_id' => $campaign->id,
            'donation_center_id' => $request->donation_center_id ?? 1,
            'user_id' => $userId,
            'appointment_date' => $date,
            'appointment_time' => $time,
            'status' => 'scheduled',
        ]);

        // ALPHANUMERIC SHORT CODE FOR HGD
        $groupAlpha = preg_replace('/[^a-zA-Z]/', '', $request->guest_blood_type ?? 'O');
        if (empty($groupAlpha)) $groupAlpha = 'O';
        $shortCode = 'HGD-' . strtoupper(substr($groupAlpha, 0, 1)) . '-' . rand(100, 999);

        $qrData = $shortCode . '-' . $appointment->id;

        $qrRecord = QRCode::create([
            'donation_campaign_id' => $campaign->id,
            'code_data' => $qrData,
            'file_path' => null 
        ]);

        $appointment->qr_code_path = $qrData;
        $appointment->save();

        // Phase 9: Real SMS notification - send pass details to donor
        if (!empty($request->guest_phone)) {
            $centerName = $request->donation_center_id == 2 ? 'HGOPY' : "L'Hôpital Général";
            $message = "Batement Solidaire: Urgence confirmée! Votre Pass est [{$shortCode}]. Présentez-vous à l'accueil de {$centerName}. Merci de sauver une vie.";
            \App\Services\SmsService::sendTwilioSms($request->guest_phone, $message);
        }

        return response()->json([
            'appointment' => $appointment,
            'qr_data' => $qrData,
            'short_code' => $shortCode
        ], 201);
    }
}
