<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name')->default('')->nullable();
            $table->string('owner_email')->default('')->nullable();
            $table->string('owner_phone1')->default('')->nullable();
            $table->string('owner_phone2')->default('')->nullable();
            $table->string('owner_address')->default('')->nullable();
            $table->string('owner_registration')->unique()->default('1');
            $table->string('pet_name')->default('')->nullable();
            $table->string('pet_breed')->default('')->nullable();
            $table->string('pet_gender')->default('')->nullable();
            $table->string('pet_colour')->default('')->nullable();
            $table->string('pet_breeder_address')->default('')->nullable();
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
        Schema::dropIfExists('owners');
    }
}
