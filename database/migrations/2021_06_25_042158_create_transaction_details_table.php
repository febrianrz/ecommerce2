<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction_details', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('transaction_id');
			$table->unsignedBigInteger('chart_id');
			$table->unsignedBigInteger('product_id');
			$table->unsignedBigInteger('quantity');
			$table->unsignedBigInteger('price');
			$table->string('description');
			$table->timestamps();

			$table->foreign('transaction_id')
				->references('id')
				->on('transactions')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('chart_id')
				->references('id')
				->on('carts')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('product_id')
				->references('id')
				->on('products')
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
		Schema::dropIfExists('transaction_details');
	}
}
