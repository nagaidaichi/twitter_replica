<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('following')->unsigned()->index();
            $table->integer('followed')->unsigned()->index();
            $table->timestamps();

            $table->foreign('following')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('followed')->references('id')->on('users')->onDelete('cascade');
            
            $table->unique(['following', 'followed']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('followers');
    }
}
