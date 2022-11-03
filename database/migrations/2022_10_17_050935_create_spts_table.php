<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spt', function (Blueprint $table) {
            $table->id();
            $table->string("no_spt");
            $table->string("tgl_berangkat");
            $table->string("tgl_kembali");
            $table->string("asal");
            $table->string("tujuan");
            $table->string("transportasi");
            $table->string("keperluan");
            $table->string("status");
            $table->string("id_user");
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
        Schema::dropIfExists('spt');
    }
}
