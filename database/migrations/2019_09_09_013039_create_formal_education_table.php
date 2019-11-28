<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormalEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formal_education', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->string('name_of_institution');
            $table->string('faculty')->nullable();
            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('set null');
            $table->string('study_program')->nullable();
            $table->string('city');
            $table->float('average_math_score')->default(0);
            $table->float('un_math_score')->default(0);
            $table->enum('class', ['1','2','3','4','5','6'])->default('1')->comment = '1 = SD, 2 = SMP, 3 = SMA, 4 = D3, 5 = S1, 6 = S2';
            $table->year('start_year')->nullable();
            $table->year('end_year');
            $table->float('grade_point')->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('formal_education');
    }
}
