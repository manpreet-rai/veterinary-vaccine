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
            $table->string('owner_name', 50);
            $table->string('owner_email', 50);
            $table->string('owner_phone1', 14);
            $table->string('owner_phone2', 14);
            $table->string('owner_address', 50);
            $table->string('owner_registration', 50)->unique();
            $table->string('pet_name', 50);
            $table->string('pet_breed', 50);
            $table->string('pet_gender', 10);
            $table->string('pet_colour', 20);
            $table->string('pet_breeder_address', 100);
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
