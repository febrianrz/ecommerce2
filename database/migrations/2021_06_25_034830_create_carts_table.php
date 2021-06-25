<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carts', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('product_id');
			$table->string('description')->nullable();
			$table->unsignedBigInteger('quantity')->default(1);
			$table->string('status')->default('Pending');
			$table->timestamps();

			$table->foreign('user_id')
				->on('users')
				->references('id')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('product_id')
				->on('products')
				->references('id')
				->onUpdate('cascade')
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
		Schema::dropIfExists('carts');
	}
}
