<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVandorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vandors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('f_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('profile')->nullable();
            $table->text('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->text('product_being_displayed')->nullable();
            $table->text('shop_name')->nullable();
            $table->text('shop_image')->nullable();
            $table->text('shop_banner')->nullable();
            $table->text('shop_id')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('role')->nullable();
            $table->string('after_hash_passowrd')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('super_admin_status')->default(0);
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
        Schema::dropIfExists('vandors');
    }
}
