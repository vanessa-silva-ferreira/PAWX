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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('medical_history')->nullable();
            $table->boolean('spay_neuter_status');
            $table->enum('status', ['active', 'inactive']);
            $table->string('obs')->nullable();
//            $table->foreignId('species_id')->constrained('species')->onDelete('cascade');
            $table->foreignId('breed_id')->constrained('breeds')->onDelete('cascade');
            $table->foreignId('size_id')->constrained('sizes')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
