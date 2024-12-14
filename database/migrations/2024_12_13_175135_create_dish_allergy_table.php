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
        Schema::create('dish_allergy', function (Blueprint $table) {
            $table->unsignedBigInteger('dish_id');

            $table->foreign('dish_id')->references('id')->on('dishes')->cascadeOnDelete();

            $table->unsignedBigInteger('allergy_id');

            $table->foreign('allergy_id')->references('id')->on('allergies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_allergy');
    }
};
