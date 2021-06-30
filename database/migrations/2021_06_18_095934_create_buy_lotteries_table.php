<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('no_lottery');
            $table->string('num');
            $table->string('installment');
            $table->string('price');
            $table->string('status');
            $table->integer('cusm_id');
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
        Schema::dropIfExists('buy_lotteries');
    }
}
