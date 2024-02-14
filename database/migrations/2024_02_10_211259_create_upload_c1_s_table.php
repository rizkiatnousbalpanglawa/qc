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
        Schema::create('upload_c1_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('saksi_id');
            $table->foreignId('regency_id');
            $table->foreignId('district_id');
            $table->foreignId('village_id');
            $table->foreignId('tps_id');
            $table->string('kode');
            $table->enum('status',['1','2','3']);
            $table->string('lampiran_c1')->nullable();
            $table->string('lampiran_plano')->nullable();
            $table->string('lampiran_lokasi')->nullable();
            $table->integer('suara_sah');
            $table->integer('suara_tidak_sah');
            $table->integer('jumlah_pemilih');
            // $table->string('parpol_id')->nullable();
            // $table->string('caleg_id')->nullable();
            // $table->bigInteger('jumlah_suara_caleg');
            // $table->bigInteger('jumlah_suara_parpol');
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
        Schema::dropIfExists('upload_c1_s');
    }
};
