<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColumnImgOnTablePenyakits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penyakits', function (Blueprint $table) {
            $table->string('img')->nullable()->default('no-pict.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penyakits', function (Blueprint $table) {
            $table->dropColumn('img');
        });
    }
}
