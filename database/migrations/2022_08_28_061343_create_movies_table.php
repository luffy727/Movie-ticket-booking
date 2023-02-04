<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('mname');
            $table->string('mtype');
            $table->longText('mdescription');
            $table->string('image');
            $table->string('hall');
            $table->string('seat_qty');
            $table->string('chticket_price');
            $table->string('adticket_price');
            $table->tinyInteger('trending');
            $table->string('video_url');
            $table->date('date');
            $table->time('time');
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
        Schema::dropIfExists('movies');
    }
};
