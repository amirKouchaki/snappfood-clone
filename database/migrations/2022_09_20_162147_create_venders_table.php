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
    public function up()
    {
        Schema::create('venders', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('title_image',255);
            $table->string('background_image',255);
            $table->string('description',255);
            $table->string('address',400);
            $table->boolean('is_express');
            $table->boolean('is_economical');
            $table->unsignedBigInteger('delivery_fee');
            $table->foreignId('vender_type_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('venders');
    }
};
