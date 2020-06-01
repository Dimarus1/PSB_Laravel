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
            $table->string('AMOUNT');
            $table->string('CURRENCY');
            $table->string('ORDER');
            $table->string('DESC');
            $table->string('MERCH_NAME');
            $table->string('MERCHANT');
            $table->string('TERMINAL');
            $table->string('E_MAIL');
            $table->string('TRTYPE');
            $table->string('TIMESTAMP');
            $table->string('NONCE');
            $table->string('BACKREF');
            $table->string('RESULT');
            $table->string('RC');
            $table->string('RCTEXT');
            $table->string('AUTHCODE');
            $table->string('RRN');
            $table->string('INT_REF');
            $table->string('P_SIGN');
            $table->string('NAME');
            $table->string('CARD');
            $table->string('CHANNEL');
            $table->string('ADDINFO');

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
