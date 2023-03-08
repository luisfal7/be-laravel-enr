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
        Schema::create('client_service', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->default(1);
            $table->integer('precio');

            $table->foreignId('client_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('service_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_service');
    }
};
