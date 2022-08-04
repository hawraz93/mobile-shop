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
            $table->string('name');
            $table->string('size')->nullable();
            $table->string('quality')->nullable();
            $table->foreignId('type_id')->nullable()->constrained('types');
            $table->string('quantity')->nullable();
            $table->string('sellPrice')->nullable();
            $table->string('buyPrice')->nullable();
            $table->foreignId('color_id')->nullable()->constrained('colors');
            $table->foreignId('device_id')->nullable()->constrained('devices');
            $table->foreignId('box_id')->nullable()->constrained('boxs');
            $table->foreignId('user_id')->constrained('users');
            $table->longText('note')->nullable();
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
        Schema::create('products', function (Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('products');
    }
};
