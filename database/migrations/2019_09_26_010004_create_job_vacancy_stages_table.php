<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobVacancyStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacancy_stages', function (Blueprint $table) {
            $table->unsignedBigInteger('recruitment_stage_id')->nullable();
            $table->foreign('recruitment_stage_id')->references('id')->on('recruitment_stages')->onDelete('cascade');
            $table->unsignedBigInteger('job_vacancy_id')->nullable();
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('cascade');
            $table->unsignedTinyInteger('order_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_vacancy_stages');
    }
}
