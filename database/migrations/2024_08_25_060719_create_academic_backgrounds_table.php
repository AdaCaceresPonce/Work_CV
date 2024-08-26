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
        Schema::create('academic_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->text('degree_name');
            $table->text('institution');
            $table->integer('position')->default(0); // Campo para almacenar el orden
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_backgrounds');
    }
};
