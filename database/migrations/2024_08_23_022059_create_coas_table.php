<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoasTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coas', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('tm'); // Kolom untuk TM
            $table->string('im'); // Kolom untuk IM
            $table->string('ash_adb'); // Kolom untuk ASH Adb
            $table->string('ash_db'); // Kolom untuk ASH db
            $table->string('vm'); // Kolom untuk VM
            $table->string('fc'); // Kolom untuk FC
            $table->string('ts_adb'); // Kolom untuk TS Adb
            $table->string('ts_db'); // Kolom untuk TS db
            $table->string('adb'); // Kolom untuk Adb
            $table->string('arb'); // Kolom untuk Arb
            $table->string('daf'); // Kolom untuk Daf
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Hapus tabel jika migrasi dibatalkan.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coas');
    }
}
