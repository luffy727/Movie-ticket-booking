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
        Schema::create('upcmovies', function (Blueprint $table) {
            $table->id();
            $table->string('umname');
            $table->string('umtype');
            $table->longText('sdescription');
            $table->string('image');
            $table->date('rdate');
            $table->string('trailer');
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
        Schema::dropIfExists('upcmovies');
    }
};
