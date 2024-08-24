<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_v_s', function (Blueprint $table) {
            $table->id();
            $table->string('lot');
            $table->string('barge');
            $table->string('cargo');
            $table->string('qty_mt');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->string('jetty');
            $table->string('tm');
            $table->string('im');
            $table->string('ash_adb');
            $table->string('ash_db');
            $table->string('vm');
            $table->string('fc');
            $table->string('ts');
            $table->string('adb');
            $table->string('arb');
            $table->string('daf');
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
        Schema::dropIfExists('m_v_s');
    }
}
