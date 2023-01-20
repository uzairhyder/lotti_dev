<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('sub_category_id');
            $table->string('coupon_code');
            $table->string('discount_type');
            $table->string('coupon_amount');
            $table->timestamp('expiry_date');
            $table->string('free_shipping');
            $table->string('minimum_spend');
            $table->string('maximum_spend');
            $table->string('sale_itmes');
            $table->string('allowed_emails');
            $table->string('usage_limit_per_coupon');
            $table->string('usage_limit_per_user');
            $table->string('usage_limit_items');
            $table->text('description');
            $table->integer('status');
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
        Schema::dropIfExists('coupons');
    }
}
