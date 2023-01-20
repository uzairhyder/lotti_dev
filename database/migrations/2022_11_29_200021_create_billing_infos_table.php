<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_infos', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',100);
            $table->string('product_id',100);
            $table->string('attributes');
            $table->string('attribute_values');
            $table->string('quantity');
            $table->double('delivery_fee')->nullable();
            $table->double('discount')->nullable();
            $table->double('price');
            $table->double('total');
            $table->string('shipping_address');
            $table->string('billing_address');
            $table->text('paypal_response');
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
        Schema::dropIfExists('billing_infos');
    }
}
