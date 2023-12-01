<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tracker_id');
            $table->foreign('tracker_id')->references('id')->on('tracker');
            $table->string('url');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hit');
    }
};
