<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('radications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('typeproc_id');
            $table->unsignedInteger('user_id');
            $table->string('number', 9);
            $table->string('shortdescription', 100);
            $table->string('description', 500)->nullable();
            $table->string('filename', 200);
            $table->enum('status', ['Inactive', 'Active'])->default('Active');
            $table->timestamps();

            $table->foreign('typeproc_id')->references('id')->on('typesprocess');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('radications');
    }
}
