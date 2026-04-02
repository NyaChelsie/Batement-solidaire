<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DonationCenter;
use Illuminate\Http\Request;

class DonationCenterController extends Controller
{
    public function index(Request $request)
    {
        $query = DonationCenter::query();

        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        return response()->json($query->get());
    }
}
