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
            $table->string('reference')->unique();
            $table->bigInteger('user_id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('account_number')->nullable();
            $table->double('amount');
            $table->bigInteger('payment_method_id');
            $table->enum('bank', ['bdo', 'bpi', 'eastwest', 'metrobank'])->nullable();
            $table->enum('status', ['pending', 'paid', 'fraud', 'cancelled'])->default('pending');
            $table->bigInteger('approved_by')->nullable();
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
