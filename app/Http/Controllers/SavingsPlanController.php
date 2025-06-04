<?php

namespace App\Http\Controllers;

use App\Models\SavingsPlan;
use Illuminate\Http\Request;

class SavingsPlanController extends Controller
{
    // Fetch all savings plans
    public function index()
    {
        $plans = SavingsPlan::all();
        return response()->json($plans);
    }

    // Store a new savings plan (for admin)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration_months' => 'required|integer|min:1',
            'min_amount' => 'required|numeric|min:1000',
            'max_amount' => 'required|numeric|min:1000',
        ]);

        $plan = SavingsPlan::create($request->all());
        return response()->json($plan);
    }

    // Show single plan details
    public function show($id)
    {
        $plan = SavingsPlan::findOrFail($id);
        return response()->json($plan);
    }

    // Update a savings plan
    public function update(Request $request, $id)
    {
        $plan = SavingsPlan::findOrFail($id);
        $plan->update($request->all());
        return response()->json($plan);
    }

    // Delete a savings plan
    public function destroy($id)
    {
        $plan = SavingsPlan::findOrFail($id);
        $plan->delete();
        return response()->json(['message' => 'Savings Plan deleted successfully']);
    }
}
