<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('travel_packages_id')->unsigned()->index();
			$table->text('image');
			$table->softDeletes();
			$table->timestamps();
			
			$table->foreign('travel_packages_id')
				->references('id')
				->on('travel_packages')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
