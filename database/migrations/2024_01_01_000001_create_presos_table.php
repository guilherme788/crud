<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresosTable extends Migration
{
    public function up()
    {
        Schema::create('presos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('documento_identidade');
            $table->date('data_nascimento');
            $table->string('crime');
            $table->date('data_condenacao');
            $table->string('status');
            $table->foreignId('cela_id')->constrained('celas')->onDelete('cascade'); // 👈 alterado aqui
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presos');
    }
}
