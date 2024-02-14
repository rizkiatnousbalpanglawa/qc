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
        Schema::create('suara_parpols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('saksi_id');
            $table->foreignId('regency_id');
            $table->foreignId('district_id');
            $table->foreignId('village_id');
            $table->foreignId('tps_id');
            $table->foreignId('parpol_id');
            $table->string('kode');
            $table->enum('status',['1','2','3']);
            $table->integer('jumlah_suara');
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
        Schema::dropIfExists('suara_parpols');
    }
};
