<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsPlan extends Model
{
    protected $fillable = ['name', 'duration_months', 'min_amount', 'max_amount'];

    // Relationship with UserSavings
    public function userSavings()
    {
        return $this->hasMany(UserSaving::class, 'plan_id');
    }
}
