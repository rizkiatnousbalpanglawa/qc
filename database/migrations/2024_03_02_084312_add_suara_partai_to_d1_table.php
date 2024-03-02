<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('d1_s', function (Blueprint $table) {
            $table->string('suara_partai')->nullable();
            $table->string('suara_sah')->nullable();
            $table->string('suara_tidak_sah')->nullable();
            $table->string('jumlah_pemilih')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('d1_s', function (Blueprint $table) {
            //
        });
    }
};
