<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->longText('description');
            $table->timestamp('starts_at');
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('rsvp_by')->nullable();
            $table->boolean('repeated')->default(false);
            $table->unsignedBigInteger('repeated_type_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            /* CONSTRAINTS */
            $table->foreign('repeated_type_id')->references('id')->on('repeated_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
