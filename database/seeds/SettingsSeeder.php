<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
        	[
        		'name' => 'admin_base_route',
        		'display_name' => 'Panel Admin Base Url',
                'description' => 'This parameter is used to change the url for dashboar admin',
        		'value' => 'admin-aiia',
                'type' => 'text'
        	],
            [
                'name' => 'send_sms_notification',
                'display_name' => 'SMS Notification',
                'description' => 'SMS notification for job seekers when the status changes',
                'value' => '1',
                'type' => 'boolean'
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}
