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
            $table->unsignedInteger('currency_id');
            $table->string('name')->unique();
            $table->string('code');
            $table->string('image')->nullable();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('product_category_id');
            $table->integer('barcode_symbology');
            $table->integer('price');
            $table->integer('cost');
            $table->unsignedInteger('product_unit_id');
            $table->unsignedInteger('product_sale_unit_id');
            $table->unsignedInteger('product_purchase_unit_id');
            $table->integer('stock_alert');
            $table->text('note')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->string('status');
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
