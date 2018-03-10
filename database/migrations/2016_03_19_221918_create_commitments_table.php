<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commitments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('gig_id')->unsigned();
            $table->foreign('gig_id')->references('id')->on('gig')->onDelete('cascade');

            $table->integer('attendance')->default(0); // 0 = attending, 1 = maybe, 2 = not attending
            $table->timestamps();
        });

        Schema::create('commitment_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('commitment_id')->unsigned()->default(0);
            $table->foreign('commitment_id')->references('id')->on('commitments')->onDelete('cascade');

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
        Schema::drop('commitment_user');
        Schema::drop('commitments');
    }
}
