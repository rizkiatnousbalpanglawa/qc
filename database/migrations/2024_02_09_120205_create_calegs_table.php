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
        Schema::create('calegs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parpol_id');
            $table->string('nomor_urut')->nullable();
            $table->enum('status',['1','2','3']); // 1 = DPR RI, 2 = DPRD PROV, 3 = DPRD KAB/KOTA //
            $table->string('nama');
            $table->string('dapil')->nullable();
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
        Schema::dropIfExists('calegs');
    }
};
