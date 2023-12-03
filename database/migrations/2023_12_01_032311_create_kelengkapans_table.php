<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelengkapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapan', function (Blueprint $table) {
            $table->id();
            $table->string('sticker', 100);
            $table->string('ruangan', 100);
            $table->string('pylon', 100);
            $table->string('ac', 100);
            $table->string('cat', 100);
            $table->string('kerangkengCover', 150);
            $table->string('cover', 150);
            $table->string('genset', 150);
            $table->string('ups', 150);
            $table->string('gambar', 250)->nullable();
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
        Schema::dropIfExists('kelengkapan');
    }
}
