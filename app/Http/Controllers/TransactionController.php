<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Fetch all transactions for logged-in user
    public function index()
    {
        $transactions = Auth::user()->transactions;
        return response()->json($transactions);
    }

    // Store a new transaction (deposit only for now)
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'type' => 'required|in:deposit,withdrawal',
        ]);

        $transaction = Auth::user()->transactions()->create([
            'amount' => $request->amount,
            'type' => $request->type,
            'status' => 'pending',
        ]);

        return response()->json($transaction);
    }
}
