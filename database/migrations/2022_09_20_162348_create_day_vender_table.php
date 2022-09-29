<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('day_vender', function (Blueprint $table) {
            $table->id();
            $table->time('opens_at');
            $table->time('closes_at');
            $table->foreignId('vender_id')->constrained()->cascadeOnDelete();
            $table->foreignId('day_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_vender');
    }
};
