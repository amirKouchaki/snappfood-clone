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
        Schema::create('sub_category_vender', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vender_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sub_category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();


            $table->index(['vender_id','sub_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category_vender');
    }
};
