<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('education_levels')->delete();

        DB::table('education_levels')->insert(array (
            0 =>
            array (
                'id' => 2,
                'name' => 'D3',
                'form_type' => '2',
                'created_at' => '2019-08-13 04:23:43',
                'updated_at' => '2019-09-02 02:54:59',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'D4 / S1',
                'form_type' => '2',
                'created_at' => '2019-08-13 04:23:51',
                'updated_at' => '2019-09-02 02:55:06',
            ),
            2 =>
            array (
                'id' => 4,
                'name' => 'SMA',
                'form_type' => '1',
                'created_at' => '2019-08-13 04:24:19',
                'updated_at' => '2019-09-02 02:54:40',
            ),
            3 =>
            array (
                'id' => 5,
                'name' => 'SMK',
                'form_type' => '1',
                'created_at' => '2019-09-02 02:54:52',
                'updated_at' => '2019-09-02 02:54:52',
            ),
        ));


    }
}