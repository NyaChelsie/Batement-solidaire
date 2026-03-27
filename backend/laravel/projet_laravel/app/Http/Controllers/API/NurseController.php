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
            'blood_pressure' => 'required|string',
            'hemoglobin_level' => 'required|numeric',
        ]);

        $appointment = Appointment::with('donor')->findOrFail($id);

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
            $stock = BloodStock::firstOrCreate(
                ['blood_type' => $appointment->donor->blood_type],
                ['quantity_bags' => 0]
            );
            $stock->increment('quantity_bags');
        }

        return response()->json([
            'message' => 'Don validé avec succès.',
            'appointment' => $appointment
        ]);
    }
}
