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
                $table->BigIncrements('id');
                $table->string('brand');
                $table->string('type');
                $table->integer('price');
                $table->text('description');
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->unsignedBigInteger('image_id');
                $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
