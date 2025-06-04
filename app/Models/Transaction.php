<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'amount', 'type', 'date', 'status'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
