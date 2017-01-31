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
            $table->integer('category_id')->unsigned();
            $table->integer('mark_id')->unsigned();
            $table->string('name',100)->unique();
            $table->string('slug');
            $table->text('description');
            $table->string('extract');
            $table->decimal('price',12,2);
            $table->boolean('visible');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('mark_id')->references('id')->on('marks')->onDelete('cascade');
           
        });
        
        
        
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('products');
    }
}