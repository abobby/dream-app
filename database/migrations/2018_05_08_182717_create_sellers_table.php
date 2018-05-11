<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['dealer', 'broker', 'private']);
            $table->string('name', 100);
            $table->text('address');
            $table->string('phone', 20);
            $table->string('email', 100)->unique();
            $table->string('website', 150);
            $table->timestamps();
            $table->tinyInteger('status');

            $table->index('type');
            $table->index('name');
            $table->index(['email', 'phone']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
