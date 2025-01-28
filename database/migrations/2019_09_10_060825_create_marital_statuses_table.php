<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaritalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->enum('status_ktp', ['1', '2', '3', '4'])->default('1')->comment = '1 = Single, 2 = Tunangan, 3 = Menikah, 4 = Bercerai';
            $table->enum('status_actual', ['1', '2', '3', '4'])->default('1')->comment = '1 = Single, 2 = Tunangan, 3 = Menikah, 4 = Bercerai';
            $table->date('date_ktp')->nullable();
            $table->date('date_actual')->nullable();
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
        Schema::dropIfExists('marital_statuses');
    }
}
