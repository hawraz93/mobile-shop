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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size')->nullable();
            $table->string('quality')->nullable();
            $table->string('quantity')->nullable();
            $table->string('sellPrice')->nullable();
            $table->string('buyPrice')->nullable();
            $table->foreignId('color_id')->constrained('colors')->nullable();
            $table->foreignId('device_id')->constrained('devices')->nullable();
            $table->foreignId('box_id')->constrained('boxs')->nullable();
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
        Schema::create('accessories', function (Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('accessories');
    }
};
