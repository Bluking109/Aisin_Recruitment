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
            [
                'name' => 'email_contact',
                'display_name' => 'Contact Email',
                'description' => 'The email address that will receive the message, when there is a message from the visitor',
                'value' => 'ali.usman@aiia.co.id',
                'type' => 'text'
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}
