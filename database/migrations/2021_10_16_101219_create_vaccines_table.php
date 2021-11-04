<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('owner_registration')->default('')->nullable();
            $table->string('vaccine_name')->default('')->nullable();
            $table->string('vaccine_label')->default('')->nullable();
            $table->string('vaccinator')->default('')->nullable();
            $table->string('vaccine_date')->default('')->nullable();
            $table->string('next_due_date')->default('')->nullable();
            $table->string('remarks')->default('')->nullable();
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
        Schema::dropIfExists('vaccines');
    }
}
