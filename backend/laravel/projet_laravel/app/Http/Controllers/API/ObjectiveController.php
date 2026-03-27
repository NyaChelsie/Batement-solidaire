<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    public function index()
    {
        $objectives = \App\Models\Objective::withCount([
            'campaigns as active_campaigns_count' => function ($query) {
                $query->where('is_active', true);
            }
        ])->get();

        // Calculate total funds raised per objective (requires advanced query or loop)
        // Simplified approach: Loop and sum using relationship
        $objectives->map(function ($objective) {
            $objective->total_raised = $objective->campaigns->sum(function ($campaign) {
                return $campaign->donations ? $campaign->donations->where('status', 'completed')->sum('amount') : 0;
            });
            return $objective;
        });

        return response()->json($objectives);
    }
}
