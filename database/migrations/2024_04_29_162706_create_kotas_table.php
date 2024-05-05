<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotasTable extends Migration
{
    public function up()
    {
        Schema::create('kotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('provinsi_id')->constrained('provinsis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kotas');
    }
}
