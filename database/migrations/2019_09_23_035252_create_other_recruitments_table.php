<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_recruitments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_seeker_id')->nullable();
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->string('organizer', 191);
            $table->enum('is_astra', ['0', '1'])->default('0')->comment = 'Astra = 1, Non Astra = 0';
            $table->enum('process', ['1','2','3','4','5','6'])
                ->default('1')
                ->comment = '1 = Administrasi, 2 = Psikotest, 3 = Interview HRD, 4 = Interview User, 5 = MCU, 6 = Lain-Lain';
            $table->string('place', 191);
            $table->date('date');
            $table->string('position');
            $table->enum('status', ['1', '2', '3'])
                ->default('1')
                ->comment = '1 = Dalam Proses, 2 = Di Terima, 3 = Di tolak';
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
        Schema::dropIfExists('other_recruitments');
    }
}
