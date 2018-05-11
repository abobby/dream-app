<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('listing_id');
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->text('comment');
            $table->tinyInteger('rating');
            $table->timestamps();
            $table->tinyInteger('status');

            $table->index('rating');
            $table->index(['name', 'email']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
