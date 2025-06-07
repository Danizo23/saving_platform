<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SavingsPlan;
use App\Models\Transaction;
use App\Models\User;

class UserSaving extends Model
{
    protected $fillable = ['user_id', 'plan_id', 'amount_saved', 'start_date', 'end_date', 'status'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with SavingsPlan
    public function plan()
    {
        return $this->belongsTo(SavingsPlan::class, 'plan_id');
    }

    // Relationship with Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function saving()
    {
    return $this->belongsTo(Saving::class);
    }

}
