<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->BigInteger('travel_packages_id');
			$table->BigInteger('users_id')->nullable();
			$table->BigInteger('additional_visa');
			$table->BigInteger('transaction_total');
			$table->string('transaction_status'); //IN_CARD , pending , cancel
			$table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
