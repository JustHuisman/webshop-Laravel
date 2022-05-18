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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->unsignedBigInteger('delivery_address');
            $table->foreign('delivery_address')->references('id')->on('addresses');
            $table->unsignedBigInteger('invoice_address');
            $table->foreign('invoice_address')->references('id')->on('addresses');
            $table->date('delivery_date');
            $table->integer('order_number');
            $table->unsignedBigInteger('order_status');
            $table->foreign('order_status')->references('id')->on('order_statuses');
            $table->timestamps();
            $table->softDeletes();
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
