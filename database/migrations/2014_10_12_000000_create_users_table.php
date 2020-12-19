<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sponsor_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->integer('used_points')->default(0);
            $table->integer('available_points')->default(0);
            $table->integer('direct_recruits')->default(0);
            $table->integer('product_sold')->default(0);
            $table->double('commission')->default(0);
            $table->double('lifetime_earning')->default(0);
            $table->integer('ppb')->default(0);
            $table->integer('hppb')->default(0);
            $table->enum('status', ['inactive', 'active'])->default('inactive');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
