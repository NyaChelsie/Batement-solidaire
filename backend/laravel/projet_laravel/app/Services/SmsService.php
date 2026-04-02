<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    /**
     * Sends an SMS message using Twilio's HTTP API (no SDK required).
     *
     * @param string $to
     * @param string $message
     * @return bool
     */
    public static function sendTwilioSms($to, $message)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_PHONE_NUMBER');

        if (!$sid || !$token || !$from) {
            Log::warning('Twilio credentials completely missing. SMS simulation mode active.', ['to' => $to, 'message' => $message]);
            return false;
        }

        try {
            $response = Http::asForm()
                ->withBasicAuth($sid, $token)
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$sid}/Messages.json", [
                    'From' => $from,
                    'To' => $to,
                    'Body' => $message,
                ]);

            if ($response->successful()) {
                Log::info('SMS Sent successfully via Twilio.', ['to' => $to]);
                return true;
            } else {
                Log::error('Twilio SMS Error', ['response' => $response->json()]);
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Twilio Exception: ' . $e->getMessage());
            return false;
        }
    }
}
