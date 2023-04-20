<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBejegyzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bejegyzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tevekenyseg_id')->references('tevekenyseg_id')->on('tevekenysegs');
            $table->integer('osztaly_id');
            $table->string('allapot');
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
        Schema::dropIfExists('bejegyzes');
    }
}
