<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->string('language', 100);
            $table->enum('reading', ['bad', 'good'])->default('good');
            $table->enum('writing', ['bad', 'good'])->defautl('good');
            $table->enum('grammar', ['bad', 'good'])->default('good');
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
        Schema::dropIfExists('foreign_languages');
    }
}
