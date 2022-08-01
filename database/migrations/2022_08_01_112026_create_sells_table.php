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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accessory_id')->constrained('accessories');
            $table->string('sellPrice');
            $table->string('quantity');
            $table->boolean('confirm')->default(0);
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
        Schema::create('sells', function (Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('sells');
    }
};
