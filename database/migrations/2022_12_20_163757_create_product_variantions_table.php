<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variantions', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('define_product_variant_id')->nullable();
            $table->string('product_attribute_id')->nullable();
            $table->string('product_additional_attribute_id')->nullable();
            $table->string('variant')->nullable();
            $table->string('attribute')->nullable();
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
        Schema::dropIfExists('product_variantions');
    }
}
