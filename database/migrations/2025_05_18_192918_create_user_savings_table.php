<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSavingsTable extends Migration
{
    public function up()
    {
        Schema::create('user_savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('savings_plan_id')->constrained('savings_plans')->cascadeOnDelete();
            $table->decimal('amount_saved', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_savings');
    }
}

