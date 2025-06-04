<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsPlansTable extends Migration
{
    public function up()
    {
        Schema::create('savings_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('savings_plan_id')->default(1)->constrained('savings_plans')->onDelete('cascade');
            $table->string('name');
            $table->integer('duration_months');
            $table->decimal('min_amount', 10, 2)->default(1000);
            $table->decimal('max_amount', 10, 2)->default(3000000);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings_plans');
    }
}
