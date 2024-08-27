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
        Schema::create('our_trainings_page_contents', function (Blueprint $table) {
            $table->id();

            $table->text('cover_title');
            $table->string('cover_img');

            $table->text('our_trainings_title');
            $table->text('our_trainings_description');
            $table->string('our_trainings_img');

            $table->text('trainings_we_offer_title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_trainings_page_contents');
    }
};
