<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('producte', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('descripcio')->nullable();
            $table->string('imatge')->nullable();
            $table->decimal('preu', 10, 2);
            $table->foreignId('categoria_id')->constrained(table:'categoria')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('producte');
    }
};
