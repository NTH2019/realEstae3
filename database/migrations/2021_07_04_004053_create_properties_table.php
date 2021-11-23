<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('bath');
            $table->integer('bed');
            $table->decimal('area');
            $table->string('city');
            $table->string('city_slug');
            $table->string('address');
            $table->decimal('price');
            $table->string('image');
            $table->enum('type',['Căn hộ','Chung cư']);
            $table->string('type_slug');
            $table->enum('purpose',['Bán','Cho thuê']);
            $table->string('floor_plan')->nullable();
            $table->string('video')->nullable();
            $table->integer('view')->default(0);
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('properties');
    }
}
