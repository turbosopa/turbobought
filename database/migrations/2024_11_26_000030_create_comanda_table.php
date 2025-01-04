<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comanda', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->decimal('preutot', 10, 2);
            $table->foreignId('usuari_id')->constrained(table:'users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comanda');
    }
};
