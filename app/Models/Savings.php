<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Savings extends Model
{
    use HasFactory;

    // Jina la table (optional kama ni "savings")
    protected $table = 'savings';

    // Fields zinazoruhusiwa kujazwa (mass assignable)
    protected $fillable = ['user_id', 'amount', 'duration', 'status', 'start_date', 'end_date', 'savings_plan_id'];


    // Kama unataka Laravel ifahamu kuwa 'start_date' na 'end_date' ni dates
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    // Optionally, uhusiano na user (assuming una user model)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
