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
        Schema::create('buy_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->integer('price');
            $table->string('priceType')->nullable();
            $table->string('rate')->nullable();
            $table->string('productsNum')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('shipping')->nullable();
            $table->string('note')->nullable();
            $table->foreignId('user_id')->constrained('users');

            $table->softDeletes();
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
        Schema::create('buy_orders', function (Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('buy_orders');
    }
};
