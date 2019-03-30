<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_relationship', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('relating_user_id');
            $table->unsignedBigInteger('related_user_id');
            $table->integer('user_relationship_type_id');
            $table->foreign('user_relationship_type_id')->references('id')->on('user_relationship_type');
            $table->foreign('relating_user_id')->references('id')->on('users');
            $table->foreign('related_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_relationship');
    }
}
