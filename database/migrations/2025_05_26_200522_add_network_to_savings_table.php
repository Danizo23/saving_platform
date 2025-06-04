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
    Schema::table('savings', function (Blueprint $table) {
        $table->string('network')->after('savings_plan_id');
    });
}

public function down()
{
    Schema::table('savings', function (Blueprint $table) {
        $table->dropColumn('network');
    });
}

};
