<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->char('identity_number', 16)->nullable()->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 150)->nullable();
            $table->string('token_verification')->nullable();
            $table->string('place_of_birth', 50)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['1', '2'])->default('1')->comment = "1 = Laki - Laki, 2 = Perempuan";
            $table->string('address')->nullable();
            $table->unsignedBigInteger('address_village_id')->nullable();
            $table->foreign('address_village_id')->references('id')->on('villages')->onDelete('set null');
            $table->string('address_telephone_number', 16)->nullable();
            $table->string('parent_telephone_number', 16)->nullable();
            $table->string('domicile')->nullable();
            $table->unsignedBigInteger('domicile_village_id')->nullable();
            $table->foreign('domicile_village_id')->references('id')->on('villages')->onDelete('set null');
            $table->string('domicile_telephone_number', 16)->nullable();
            $table->string('handphone_number', 16);
            $table->tinyInteger('birth_order')->default(1);
            $table->string('driving_licences')->nullable();
            $table->enum('religion', ['1','2','3','4','5'])->default('1')->comment = '1 = islam, 2 = hindu, 3 = budha, 4 = katolik, 5 = protestan';
            $table->enum('is_blacklist', ['0', '1'])->default('0')->comment = '0 = Tidak terblacklist, 1 = terblacklist';
            $table->integer('height')->default(0);
            $table->integer('weight')->default(0);
            $table->enum('clothes_size', ['M', 'L', 'XL'])->default('M');
            $table->enum('blood_type', ['A','B','AB','O'])->default('A');
            $table->tinyInteger('pants_size')->nullable();
            $table->tinyInteger('shoe_size')->nullable();
            $table->string('photo')->nullable();
            $table->date('blacklist_until')->nullable();
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('set null');
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
        Schema::dropIfExists('job_seekers');
    }
}
