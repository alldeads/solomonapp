<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('address_id');
            $table->bigInteger('payment_method_id');
            $table->string('reference_code');
            $table->double('amount');
            $table->enum('type', ['order', 'account', 'other'])->default('order');
            $table->enum('status', ['pending', 'processing', 'received', 'fraud', 'on-hold', 'rejected'])->default('pending');
            $table->timestamp('date_paid')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
