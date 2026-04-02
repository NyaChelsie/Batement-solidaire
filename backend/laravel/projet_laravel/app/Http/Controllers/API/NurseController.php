<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\BloodStock;
use App\Models\User;

class NurseController extends Controller
{
    // Retrieve appointment by QR code
    public function getAppointmentByQR($codeData)
    {
        $appointment = Appointment::with(['donor', 'donationCenter'])
            ->where('qr_code_path', $codeData)
            ->first();

        if (!$appointment) {
            return response()->json(['message' => 'Aucun rendez-vous trouvé pour ce QR Code (ou QR Code invalide).'], 404);
        }

        return response()->json($appointment);
    }

    // Enter vitals and complete donation
    public function completeDonation(Request $request, $id)
    {
        $request->validate([
<<<<<<< HEAD
            'status' => 'required|in:completed,rejected',
            'blood_pressure' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'donation_type' => 'nullable|string|in:benevole,familial,remunere',
=======
            'blood_pressure' => 'required|string',
            'hemoglobin_level' => 'required|numeric',
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        ]);

        $appointment = Appointment::with('donor')->findOrFail($id);

<<<<<<< HEAD
        if ($appointment->status === 'completed' || $appointment->status === 'rejected') {
            return response()->json(['message' => 'Don déjà traité.'], 400);
        }

        // Update appointment
        $appointment->status = $request->status;
        $appointment->blood_pressure = $request->blood_pressure;
        $appointment->save();
        
        // Update donor weight
        if ($appointment->donor && $request->weight) {
            $appointment->donor->weight = $request->weight;
            $appointment->donor->save();
        }

        $orderNumber = null;

        // Update blood stock and generate order number ONLY if APTE (completed)
        if ($request->status === 'completed' && $appointment->donor && $appointment->donor->blood_type) {
=======
        if ($appointment->status === 'completed') {
            return response()->json(['message' => 'Don déjà validé.'], 400);
        }

        // Update appointment
        $appointment->status = 'completed';
        $appointment->blood_pressure = $request->blood_pressure;
        $appointment->hemoglobin_level = $request->hemoglobin_level;
        $appointment->save();

        // Update blood stock based on donor's blood type
        if ($appointment->donor && $appointment->donor->blood_type) {
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
            $stock = BloodStock::firstOrCreate(
                ['blood_type' => $appointment->donor->blood_type],
                ['quantity_bags' => 0]
            );
            $stock->increment('quantity_bags');
<<<<<<< HEAD

            // Save donation record to keep trace of the type
            $orderNumber = 'BAG-' . date('Ymd') . '-' . str_pad($appointment->id, 4, '0', STR_PAD_LEFT);
            
            \App\Models\Donation::create([
                'donor_id' => $appointment->user_id,
                'donation_campaign_id' => $appointment->donation_campaign_id,
                'donation_center_id' => $appointment->donation_center_id,
                'blood_type' => $appointment->donor->blood_type,
                'quantity_ml' => 450,
                'donation_date' => now(),
                // 'donation_type' => $request->donation_type, // Assuming we had this column, we skip for pure DB compatibility unless added
            ]);

            // Simulate SMS
            \Illuminate\Support\Facades\Log::info("SMS ENVOYÉ À " . $appointment->donor->phone . " : Merci " . $appointment->donor->name . " ! Votre don de sang à l'HGD sauvera 3 vies aujourd'hui. Numéro de poche: " . $orderNumber);
        }

        return response()->json([
            'message' => 'Entretien médical enregistré avec succès.',
            'appointment' => $appointment,
            'order_number' => $orderNumber
=======
        }

        return response()->json([
            'message' => 'Don validé avec succès.',
            'appointment' => $appointment
>>>>>>> 262680e68fc409ddb582cf3cd223b6bbbd53a960
        ]);
    }
}
