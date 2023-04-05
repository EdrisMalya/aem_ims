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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_date');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('payment_type_id');
            $table->unsignedInteger('currency_id');
            $table->integer('order_tax');
            $table->integer('discount');
            $table->integer('shipping');
            $table->integer('grand_total');
            $table->integer('due');
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
        Schema::dropIfExists('purchases');
    }
};
