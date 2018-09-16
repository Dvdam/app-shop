<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    // Metodo up
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            // Mis columnas nuestros valores no pueden ser nulos
            $table->string('name');
            // Si quiero que reciba valores nulos se lo debo especificar
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            // Terminan mis columnas
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
        Schema::dropIfExists('categories');
    }
}
