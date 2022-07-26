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
        Schema::create('buys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->string('quantity');
            $table->string('price');
            $table->string('delegate')->nullable();
            $table->string('delegate_phone')->nullable();
            $table->longText('note')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('buyOrder_id')->constrained('buy_orders');
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
        Schema::create('buys', function (Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('buys');
    }
};
