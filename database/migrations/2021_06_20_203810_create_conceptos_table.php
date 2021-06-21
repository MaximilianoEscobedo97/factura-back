<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ClaveProdSev');
            $table->string('NoIdentificacion')->nullable();
            $table->integer('Cantidad');
            $table->string('ClaveUnidad');
            $table->string('Unidad');
            $table->string('ValorUnitario');
            $table->string('Descripcion');
            $table->string('Descuento')->nullable();
            $table->string('Impuestos_id')->nullable();
            $table->string('NumeroPedimento')->nullable();
            $table->string('Predial')->nullable();
            $table->string('cfdiId');


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
        Schema::dropIfExists('conceptos');
    }
}
