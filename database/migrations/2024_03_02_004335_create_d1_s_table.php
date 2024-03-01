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
        Schema::create('d1_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kabupaten_id');
            $table->string('lampiran_c1')->nullable();
            $table->string('lampiran_plano')->nullable();
            $table->string('lampiran_lokasi')->nullable();
            $table->string('suara_esr')->nullable();
            $table->string('suara_nico')->nullable();
            $table->string('suara_rusdi')->nullable();
            $table->string('suara_aslam')->nullable();
            $table->string('suara_hayarna')->nullable();
            $table->string('suara_judas')->nullable();
            $table->string('suara_putri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d1_s');
    }
};
