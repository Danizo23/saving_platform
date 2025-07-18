<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavingsController;
use Illuminate\Support\Facades\Route;
use App\Models\Savings;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});
// User Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $userId = Auth::id();

        $totalAmount = Savings::where('user_id', $userId)->sum('amount');
        $activeAmount = Savings::where('user_id', $userId)->where('status', 'active')->sum('amount');
        $completedAmount = Savings::where('user_id', $userId)->where('status', 'completed')->sum('amount');

        return view('dashboard', compact('totalAmount', 'activeAmount', 'completedAmount'));
    })->name('dashboard');
});
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


// Savings Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/savings', [SavingsController::class, 'index'])->name('savings.index');
    Route::get('/savings/create', [SavingsController::class, 'create'])->name('savings.create');
    Route::post('/savings', [SavingsController::class, 'store'])->name('savings.store');
   Route::post('savings/plan/{duration}/withdraw', [SavingsController::class, 'withdrawPlan'])->name('savings.withdrawPlan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});

require __DIR__.'/auth.php';


