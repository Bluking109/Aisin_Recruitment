<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('by_vendor', ['1', '0'])->default('0')->comment = '1 = By Vendor, 0 = Internal';
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
        Schema::dropIfExists('recruitment_stages');
    }
}
