<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVandorPaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vandor_payment_requests', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('shop_id');
            $table->string('request_amoung')->nullable();
            $table->string('approve_amount')->nullable();
            $table->string('payment')->nullable();
            $table->string('bkash_number')->nullable();
            $table->string('nagad_number')->nullable();
            $table->string('rocket_number')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('othre_one')->nullable();
            $table->string('othre_two')->nullable();
            $table->string('status')->default(1);
            $table->longText('message')->nullable();
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
        Schema::dropIfExists('vandor_payment_requests');
    }
}
