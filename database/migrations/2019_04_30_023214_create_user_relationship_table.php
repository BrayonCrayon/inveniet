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
        Schema::create('user_relationships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('related_user_id');
            $table->unsignedBigInteger('user_relationship_type_id');
            $table->unsignedBigInteger('relationship_status_id')->default(1);
            $table->timestamps();
            $table->softDeletes();

            /* Constraints */
            $table->foreign('user_relationship_type_id')->references('id')->on('user_relationship_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('related_user_id')->references('id')->on('users');
            $table->foreign('relationship_status_id')->references('id')->on('relationship_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_relationships');
    }
}
