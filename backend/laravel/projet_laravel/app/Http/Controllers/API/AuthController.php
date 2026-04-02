<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

            'phone' => 'required|string|max:20',
            'blood_type' => 'nullable|string|max:5',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donateur',
            'phone' => $request->phone,
            'blood_type' => $request->blood_type,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {
        Log::info('Login attempt', ['email' => $request->email]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Log::warning('Login failed: User not found', ['email' => $request->email]);
            return response()->json(['message' => 'Email ou mot de passe incorrect (User not found)'], 401);
        }

        if (!Hash::check($request->password, $user->password)) {
            Log::warning('Login failed: Hash mismatch', ['email' => $request->email]);
            return response()->json(['message' => 'Email ou mot de passe incorrect (Hash mismatch)'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function loginOtpRequest(Request $request)
    {
        $request->validate([
            'phone' => 'required|string'
        ]);

        $user = User::where('phone', $request->phone)->orWhere('phone', '+237'.$request->phone)->first();

        if (!$user) {
            return response()->json(['message' => 'Ce numéro n\'est associé à aucun don. Si c\'est votre première fois, rejoignez un centre.'], 404);
        }

        // Mock SMS logic
        Log::info("Code de vérification pour " . $user->phone . " : 1234");
        
        return response()->json(['message' => 'Code de vérification envoyé sur votre appareil.']);
    }

    public function loginOtpVerify(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'code' => 'required|string'
        ]);

        if ($request->code !== '1234') {
            return response()->json(['message' => 'Le code de vérification est incorrect.'], 401);
        }

        $user = User::where('phone', $request->phone)->orWhere('phone', '+237'.$request->phone)->first();

        if (!$user) {
            return response()->json(['message' => 'Utilisateur introuvable.'], 404);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:5',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->blood_type = $request->blood_type;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'message' => 'Profil mis à jour avec succès',
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
