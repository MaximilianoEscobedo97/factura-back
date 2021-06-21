<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrasladosYRetenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados_y_retenidos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('Base');
            $table->string('Impuesto');
            $table->string('TipoFactor');
            $table->float('TasaOCuota');
            $table->float('Importe');
            $table->enum('Tipo',['traslado','retenido']);
            $table->string('ImpuestoId');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traslados_y_retenidos');
    }
}
