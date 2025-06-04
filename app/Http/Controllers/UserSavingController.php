<?php

namespace App\Http\Controllers;

use App\Models\UserSaving;
use App\Models\SavingsPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSavingController extends Controller
{
    // Fetch all savings for logged-in user
    public function index()
    {
        $savings = Auth::user()->savings;
        return response()->json($savings);
    }

    // Store new user savings
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:savings_plans,id',
            'amount_saved' => 'required|numeric|min:1000',
        ]);

        $plan = SavingsPlan::findOrFail($request->plan_id);
        $startDate = now();
        $endDate = $startDate->copy()->addMonths($plan->duration_months);

        $saving = Auth::user()->savings()->create([
            'plan_id' => $request->plan_id,
            'amount_saved' => $request->amount_saved,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'active',
        ]);

        return response()->json($saving);
    }

    // Show single user saving details
    public function show($id)
    {
        $saving = Auth::user()->savings()->findOrFail($id);
        return response()->json($saving);
    }
}
