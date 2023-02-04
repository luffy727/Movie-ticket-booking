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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('cname');
            $table->string('cmail');
            $table->string('cphone');
            $table->string('m_hall');
            $table->string('seatqty');
            $table->date('mdate');
            $table->time('mtime');
            $table->string('total_price');
            $table->tinyInteger('status')->default('0');
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
