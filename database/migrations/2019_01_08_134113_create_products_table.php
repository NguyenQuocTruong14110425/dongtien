<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_title')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_price_sales')->nullable();
            $table->string('product_description')->nullable();
            $table->longText('product_content')->nullable();
            $table->string('product_keyword')->nullable();
            $table->string('product_tag')->nullable();
            $table->string('product_slug')->nullable();
            $table->string('product_avatar')->nullable();
            $table->string('product_categories')->nullable();
            $table->string('product_publish')->default('publish');
            $table->string('product_status')->default('news');
            $table->integer('product_views')->default(1);
            $table->integer('product_sort')->nullable();
            $table->tinyInteger('IsDelete')->default(0);
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
