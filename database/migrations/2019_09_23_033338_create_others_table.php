<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->text('hobby')->nullable();
            $table->text('fill_spare_time')->nullable();
            $table->text('strong_point')->nullable();
            $table->text('weak_point')->nullable();
            $table->enum('use_glasses', ['0', '1'])->default('0');
            $table->string('right_eye', 200)->nullable();
            $table->string('left_eye', 200)->nullable();
            $table->enum('agreement', ['0', '1'])->default('0');
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
        Schema::dropIfExists('others');
    }
}
