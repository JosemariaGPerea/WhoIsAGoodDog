<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('razas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->string('origen')->nullable();
        $table->string('tamano')->nullable();
        $table->string('esperanza_vida')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razas');
    }
};
