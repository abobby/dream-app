<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('seller_id');
            $table->string('title', 150);
            $table->text('description');
            $table->year('lyear');
            $table->string('lmake', 80);
            $table->string('lmodel', 80);
            $table->float('price', 10, 2);
            $table->json('meta_data');
            //$table->json('search_field');
            $table->timestamps();
            $table->tinyInteger('status');

            $table->index('title');
            $table->index('lmake');
            $table->index('lmodel');
            $table->index('lyear');
            $table->foreign('category_id')->references('id')->on('listing_categories');
            $table->foreign('seller_id')->references('id')->on('sellers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
