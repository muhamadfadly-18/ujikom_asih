<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Kolom judul
            $table->text('deskripsi'); // Kolom deskripsi
            $table->string('foto'); // Kolom foto (path/nama file)
            $table->bigInteger('kategori_id')->unsigned(); // Ubah kolom kategori_id menjadi bigint
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
        Schema::dropIfExists('informasis');
    }
}
