<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Savings;
use App\Models\SavingsPlan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class SavingsController extends Controller
{
    // Display form ya kuweka akiba
   public function index()
{
    $savings = Savings::where('user_id', auth()->id())->get();
    $totalAmount = $savings->sum('amount');

    // Jumla ya akiba kwa kila mpango wa akiba
    $totalsByPlan = Savings::where('user_id', auth()->id())
        ->select('duration', DB::raw('SUM(amount) as total_amount'), DB::raw('MIN(start_date) as earliest_start_date'))
        ->groupBy('duration')
        ->get()
        ->map(function ($plan) {
            $plan->withdraw_date = Carbon::parse($plan->earliest_start_date)->addMonths($plan->duration)->toDateString();
            return $plan;
        });

    return view('savings.index', compact('savings', 'totalAmount', 'totalsByPlan'));
}

public function create()
{
    $plans = SavingsPlan::all();
    return view('savings.create', compact('plans'));
}

    // Hifadhi saving mpya
   public function store(Request $request)
{
    // Pakua mpango wa akiba kulingana na ID iliyoombwa
    $plan = SavingsPlan::findOrFail($request->savings_plan_id);

    // Thibitisha data za ombi
    $validated = $request->validate([
        'amount' => [
            'required',
            'numeric',
            'min:' . $plan->min_amount,
            'max:' . $plan->max_amount,
        ],
        'savings_plan_id' => 'required|exists:savings_plans,id',
        'network' => 'required|in:Tigo,Vodacom,Airtel,Halotel',
        
    ]);

    // Hesabu tarehe za kuanza na kumaliza
    $startDate = now();
    $endDate = now()->addMonths($plan->duration_months);

    // Hifadhi akiba mpya
    Savings::create([
        'user_id' => Auth::id(),
        'amount' => $validated['amount'],
        'duration' => $plan->duration_months,
        'status' => 'pending',
        'start_date' => $startDate,
        'end_date' => $endDate,
        'savings_plan_id' => $plan->id,
        'network' => $validated['network'],
        
    ]);

    // Rudisha mtumiaji kwenye dashibodi na ujumbe wa mafanikio
    return redirect()->route('dashboard')->with('success', 'Akiba imewekwa kikamilifu!');
}

public function withdrawPlan($duration)
{
    $user = auth()->user();

    // Chukua savings zote za user zenye duration hiyo na muda umefika
    $savings = $user->savings()
        ->where('duration', $duration)
        ->where('end_date', '<=', now())
        ->where('status', 'active') // Epuka zile zilizokwisha tolewa tayari
        ->get();

    if ($savings->isEmpty()) {
        return back()->with('error', 'Hakuna akiba inayoweza kutolewa kwa mpango huu kwa sasa.');
    }

    // Loop na toa kila moja
    foreach ($savings as $saving) {
        $saving->status = 'withdrawn'; // au 'completed'
        $saving->save();

        // Optional: weka kwenye withdrawal history table
        // Withdrawal::create([
        //     'user_id' => $user->id,
        //     'amount' => $saving->amount,
        //     'saving_id' => $saving->id,
        //     'withdrawn_at' => now(),
        // ]);
    }

    return back()->with('success', 'Umefanikiwa kutoa akiba zote kwa mpango huu wa miezi ' . $duration);
}




}
