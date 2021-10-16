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
            $table->string('owner_registration', 50);
            $table->string('vaccine_name', 20);
            $table->string('vaccine_label', 20);
            $table->string('vaccinator', 50);
            $table->string('vaccine_date', 14);
            $table->string('next_due_date', 14);
            $table->string('remarks', 50);
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
