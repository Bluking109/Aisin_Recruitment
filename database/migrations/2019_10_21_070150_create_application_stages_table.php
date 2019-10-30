<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_application_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_application_id')->nullable();
            $table->foreign('job_application_id')
                ->references('id')
                ->on('job_applications')
                ->onDelete('cascade');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->foreign('stage_id')
                ->references('id')
                ->on('recruitment_stages')
                ->onDelete('cascade');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')
                ->references('id')
                ->on('vendors')
                ->onDelete('cascade');
            $table->dateTime('exam_at');
            $table->string('note', 191)->nullable();
            $table->enum('status', ['0', '1', '2'])->comment = '0 = waiting, 1 = confirmed, 2 = reject';
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
        Schema::dropIfExists('application_stages');
    }
}
