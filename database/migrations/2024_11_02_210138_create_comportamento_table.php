<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComportamentoTable extends Migration
{
    public function up()
    {
        Schema::create('comportamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('preso_id')->constrained()->onDelete('cascade'); // Referência ao preso
            $table->string('descricao'); // Descrição do comportamento
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comportamento');
    }
}
?>
