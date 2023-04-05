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
        Schema::create('assigned_products', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('product_id');
            $table->string('amount_type');
            $table->integer('product_amount');
            $table->unsignedInteger('base_unit_id');
            $table->integer('quantity');
            $table->string('discount_type');
            $table->integer('discount');
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
        Schema::dropIfExists('assigned_products');
    }
};
