<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorImageLinkUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_image_link_ups', function (Blueprint $table) {
            $table->id();
            $table->integer('pro_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('product_gallery')->nullable();
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
        Schema::dropIfExists('color_image_link_ups');
    }
}
