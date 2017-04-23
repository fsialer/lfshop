<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();    
            $table->integer('user_id')->unsigned();    
            $table->string('movil');
            $table->string('telephone');
            $table->enum('type',['casa','departamento','condominio','residencial','oficina','local','otros']);
            $table->string('address');
            $table->integer('lot');
            $table->integer('departament');
            $table->string('urbanization');
            $table->string('reference');
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('addresses');
    }
}
