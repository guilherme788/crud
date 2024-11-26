<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelasTable extends Migration
{
    public function up()
    {
        Schema::create('celas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->integer('capacidade');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('celas');
    }
}
