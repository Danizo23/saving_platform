<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNetworkDefaultInSavingsTable extends Migration
{
    public function up()
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->string('network')->default('Tigo')->change();
        });
    }

    public function down()
    {
        Schema::table('savings', function (Blueprint $table) {
            $table->string('network')->nullable()->change();
        });
    }
}
