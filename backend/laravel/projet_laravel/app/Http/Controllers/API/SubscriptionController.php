<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'frequency' => 'required|in:monthly,yearly',
        ]);

        // Check if already subscribed
        $existing = Subscription::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();

        if ($existing) {
            return response()->json(['message' => 'Vous avez déjà un abonnement actif.'], 400);
        }

        $subscription = Subscription::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'frequency' => $request->frequency,
            'status' => 'active'
        ]);

        return response()->json($subscription, 201);
    }

    public function mySubscription()
    {
        $subscription = Subscription::where('user_id', Auth::id())->latest()->first();
        return response()->json($subscription);
    }
}
