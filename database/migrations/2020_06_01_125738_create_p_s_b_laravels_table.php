<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePSBLaravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_s_b_laravels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('AMOUNT');
            $table->text('CURRENCY');
            $table->text('ORDER');
            $table->text('DESC');
            $table->text('MERCH_NAME');
            $table->text('MERCHANT');
            $table->text('TERMINAL');
            $table->text('EMAIL');
            $table->text('TRTYPE');
            $table->text('TIMESTAMP');
            $table->text('NONCE');
            $table->text('BACKREF');
            $table->text('RESULT');
            $table->text('RC');
            $table->text('RCTEXT');
            $table->text('AUTHCODE');
            $table->text('RRN');
            $table->text('INT_REF');
            $table->text('P_SIGN');
            $table->text('NAME');
            $table->text('CARD');
            $table->text('CHANNEL');
            $table->text('ADDINFO');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_s_b_laravels');
    }
}
