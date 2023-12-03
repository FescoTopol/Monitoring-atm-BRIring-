<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeamanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keamanan', function (Blueprint $table) {
            $table->id();
            $table->string('routerhub',200);
            $table->string('deep_skimmer',200)->nullable();
            $table->string('skimming',200)->nullable();
            $table->string('downlite_lampu',200)->nullable();
            $table->string('smoke_detector',200)->nullable();
            $table->string('cover_card_Reader',200)->nullable();
            $table->string('pinpad',200)->nullable();
            $table->string('monitor_atm',200)->nullable();
            $table->string('card_reader_atm',200)->nullable();
            $table->string('call_center',200)->nullable();
            $table->string('angkur',200)->nullable();
            // $table->string('keterangan',200)->nullable();
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
        Schema::dropIfExists('keamanan');
    }
}
