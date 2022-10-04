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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->longText('description');
            $table->unsignedBigInteger('price');
            $table->unsignedTinyInteger('discount')->default(0);
            $table->unsignedInteger('in_stock');
            $table->foreignId('menu_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();


            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
};
