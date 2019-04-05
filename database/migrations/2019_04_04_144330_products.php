<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->string('img');
            $table->string('quantity');
            $table->string('warranty');
            $table->string('accessories');
            $table->string('condition');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->text('description');
            $table->tinyInteger('featured');
            $table->integer('prod_cate')->unsigned();
            $table->foreign('prod_cate')
                    ->references('cate_id')
                    ->on('categories')
                    ->onDelete('cascade');
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
