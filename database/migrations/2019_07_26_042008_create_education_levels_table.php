<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('form_type', ['1', '2', '3'])->comment = " 1 = Formulir tipe 1 (SMA) , 2 = Formulir tipe 2 (D3),  3 = Formulir tipe 3 (S1) ";
            $table->enum('hierarchy', ['3', '4', '5', '6'])
                ->default('3')
                ->comment = '3 = SMA/SMK, 4 = D3, 5 = S1, 6 = S2';
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
        Schema::dropIfExists('education_levels');
    }
}
