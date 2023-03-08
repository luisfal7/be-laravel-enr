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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');

            $table->foreignId('hour_id')
                  ->nullable()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('set null');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
