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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('address_type_id');
            $table->foreign('address_type_id')->references('id')->on('address_types');
            $table->string('first_name', 50);
            $table->string('last_name', 100);
            $table->string('company_name')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('address');
            $table->string('postal_code', 50);
            $table->string('city', 100);
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
        Schema::dropIfExists('addresses');
    }
};
