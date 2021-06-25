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
            $table->id();
						$table->unsignedBigInteger('user_id');
						$table->string('invoice_no');
						$table->string('payment_method')->default('cash');
						$table->string('status');
            $table->timestamps();

						$table->foreign('user_id')
							->references('id')
							->on('users')
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
        Schema::dropIfExists('transactions');
    }
}
