<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestConceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_concepts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->text('future_goals', 500)->nullable();
            $table->text('expertise', 500)->nullable();
            $table->text('working_motivation', 500)->nullable();
            $table->text('working_reason', 500)->nullable();
            $table->text('expected_facility', 500)->nullable();
            $table->date('join_date');
            $table->double('expected_salary')->default(0);
            $table->enum('place_outside', ['0', '1'])->default(0)->comment = '0 = tidak mau, 1 = mau';
            $table->string('favored_environment', 190)->default('lapangan');
            $table->string('unfavored_environment', 190)->default('lapangan');
            $table->text('like_people', 500)->nullable();
            $table->text('dificult_decisions', 500)->nullable();
            $table->text('field_of_works', 500)->nullable();
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
        Schema::dropIfExists('interest_concepts');
    }
}
