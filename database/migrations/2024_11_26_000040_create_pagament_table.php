<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pagament', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->boolean('estat')->default(false);
            $table->enum('tipus', ['bizum', 'targeta', 'paypal']);
            $table->foreignId('comanda_id')->constrained(table:'comanda')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagament');
    }
};
