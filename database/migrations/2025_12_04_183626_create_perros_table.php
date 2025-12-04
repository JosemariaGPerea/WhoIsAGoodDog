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
        Schema::create('perros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        $table->integer('edad')->nullable();
        $table->string('sexo')->nullable(); // macho / hembra
        $table->text('descripcion')->nullable();
        $table->string('foto_principal')->nullable();
        $table->foreignId('raza_id')->nullable()->constrained('razas')->nullOnDelete();
        $table->boolean('adoptado')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perros');
    }
};
