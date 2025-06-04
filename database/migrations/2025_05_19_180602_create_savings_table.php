<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingsTable extends Migration
{
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->foreignId('savings_plan_id')->default(1)->constrained('savings_plans')->onDelete('cascade'); // relation na savings_plans
            $table->decimal('amount', 15, 2);
            $table->integer('duration'); // kwa miezi
            $table->string('status')->default('pending');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('savings');
    }
}
