<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('reference')->unique();
            $table->double('sub_total');
            $table->double('total');
            $table->double('shipping_fee')->default(0);
            $table->double('quantity');
            $table->bigInteger('payment_id')->nullable();
            $table->enum('shipping_type', ['pick-up', 'delivery']);
            $table->enum('status', ['pending', 'processing', 'accepted', 'for-delivery', 'out-for-delivery', 'delivered', 'cancelled', 'on-hold'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
