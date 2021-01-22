<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbr');
            $table->text('logo')->nullable();
            $table->boolean('transaction')->default(false);
            $table->boolean('payment')->default(false);
            $table->boolean('activation')->default(false);
            $table->enum('status', ['active', 'inactive', 'fraud', 'on-hold', 'rejected'])->default('active');
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
        Schema::dropIfExists('payment_methods');
    }
}
