<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowToAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_to_applies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('sub_title');
            $table->string('image');
            $table->text('content')->nullable();
            $table->enum('is_active', ['0', '1'])->default('1')->comment = '0 = Inactive, 1 = Active';
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
        Schema::dropIfExists('how_to_apllies');
    }
}
