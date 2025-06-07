<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('user_savings', function (Blueprint $table) {
        $table->unsignedBigInteger('saving_id')->nullable()->after('user_id');

        $table->foreign('saving_id')->references('id')->on('savings')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_savings', function (Blueprint $table) {
            //
        });
    }
};
