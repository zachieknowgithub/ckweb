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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unasigned();
            $table->decimal('subtotal');
            $table->decimal('tax');
            $table->decimal('total');
            $table->decimal('firstname');
            $table->decimal('lastname');
            $table->decimal('mobile');
            $table->decimal('email');
            $table->decimal('address');
            $table->decimal('city');
            $table->decimal('province');
            $table->decimal('country');
            $table->decimal('zipcode');
            $table->enum('status',['ordered','delivered','canceled'])->default('ordered');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
