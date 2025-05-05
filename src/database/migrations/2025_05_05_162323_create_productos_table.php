<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Campo ID autoincremental
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->text('descripcion')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps(); // Crea created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos'); // Borra la tabla si se ejecuta una reversión
    }
};