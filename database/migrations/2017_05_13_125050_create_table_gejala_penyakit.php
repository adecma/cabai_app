<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGejalaPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gejala_id')->unsigned();
            $table->integer('penyakit_id')->unsigned();
            $table->decimal('bobot', 2, 1);
            $table->timestamps();

            $table->foreign('gejala_id')->references('id')->on('gejalas');
            $table->foreign('penyakit_id')->references('id')->on('penyakits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala_penyakit');
    }
}
