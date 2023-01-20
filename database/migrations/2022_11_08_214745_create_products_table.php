<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('parent_category_id');
            $table->string('main_category_id');
            $table->string('sub_category_id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('price');
            $table->string('total_price');
            $table->string('discount');
            $table->string('stock');
            $table->string('image');
            $table->integer('status');
            $table->text('description');
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
}
