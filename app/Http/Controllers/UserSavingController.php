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
        'amount' => 'required|numeric|min:1000',
        'saving_id' => 'required|exists:savings,id',
    ]);

    $saving = Saving::findOrFail($request->saving_id);

    $userSaving = new UserSaving();
    $userSaving->user_id = auth()->id();
    $userSaving->saving_id = $saving->id;
    $userSaving->amount = $request->amount;
    $userSaving->start_date = now();
    $userSaving->end_date = now()->addMonths($saving->duration);
    $userSaving->status = 'active';
    $userSaving->save();

    return redirect()->route('dashboard')->with('success', 'Akiba imehifadhiwa!');
}


    // Show single user saving details
    public function show($id)
    {
        $saving = Auth::user()->savings()->findOrFail($id);
        return response()->json($saving);
    }
}
