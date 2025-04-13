<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preso_id'); 
            $table->unsignedBigInteger('visitante_id'); 
            $table->date('data_visita');
            $table->timestamps();
    
            $table->foreign('preso_id')->references('id')->on('presos')->onDelete('cascade');
            $table->foreign('visitante_id')->references('id')->on('visitantes')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('visitas');
    }
}
