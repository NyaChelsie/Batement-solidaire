<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        // Get appointments for the authenticated user
        $appointments = Appointment::where('user_id', Auth::id())
            ->with('donationCenter')
            ->orderBy('appointment_date', 'asc')
            ->orderBy('appointment_time', 'asc')
            ->get();

        return response()->json($appointments);
    }

    public function store(Request $request)
    {
        $request->validate([
            'donation_center_id' => 'required|exists:donation_centers,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        // In a real app, generate a real QR code path or identifier here
        $qrCodeId = uniqid('APPT-');

        $appointment = Appointment::create([
            'user_id' => Auth::id(),
            'donation_center_id' => $request->donation_center_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'status' => 'scheduled',
            'qr_code_path' => $qrCodeId,
        ]);

        return response()->json([
            'message' => 'Rendez-vous confirmé',
            'appointment' => $appointment->load('donationCenter')
        ], 201);
    }

    public function cancel($id)
    {
        $appointment = Appointment::where('user_id', Auth::id())->findOrFail($id);

        if ($appointment->status === 'completed') {
            return response()->json(['message' => 'Impossible d\'annuler un rendez-vous complété'], 400);
        }

        $appointment->status = 'cancelled';
        $appointment->save();

        return response()->json([
            'message' => 'Rendez-vous annulé',
            'appointment' => $appointment
        ]);
    }
}
