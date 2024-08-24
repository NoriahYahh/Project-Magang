<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_o_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('tm');
            $table->string('im');
            $table->string('ash');
            $table->string('vm');
            $table->string('VM2');
            $table->string('fc');
            $table->string('ts');
            $table->string('Adb');
            $table->string('Arb');
            $table->string('Daf');
            $table->string('Analisis_Standar');
            $table->string('Coa_number');
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
        Schema::dropIfExists('r_o_a_s');
    }
}
