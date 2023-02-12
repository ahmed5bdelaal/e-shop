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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cate_id');
            $table->foreignId('brand_id');
            $table->string('name');
            $table->string('offer')->nullable();
            $table->mediumText('s_disc');
            $table->longText('disc');
            $table->string('o_price');
            $table->string('s_price');
            $table->json('image');
            $table->string('rate')->default('0');
            $table->string('qty');
            $table->string('tax')->default('0');
            $table->tinyInteger('status');
            $table->tinyInteger('dis')->default('0');
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_disc');
            $table->mediumText('meta_keywords');
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
        Schema::dropIfExists('products');
    }
};
