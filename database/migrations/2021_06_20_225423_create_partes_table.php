<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('ClaveProdServ');
            $table->string('NoIdentificacion')->nullable();
            $table->integer('Cantidad');
            $table->string('Unidad');
            $table->integer('ValorUnitario');
            $table->string('Descripcion');
            $table->string('conceptoId');

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
        Schema::dropIfExists('partes');
    }
}
