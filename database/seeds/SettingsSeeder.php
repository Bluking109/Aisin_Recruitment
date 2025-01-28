<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AIIASettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AIIASettings = [
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
            [
                'name' => 'recaptcha_validation',
                'display_name' => 'Recaptcha Validation',
                'description' => 'Validation of recaptcha',
                'value' => '0',
                'type' => 'boolean'
            ],
            [
                'name' => 'home_header_title',
                'display_name' => 'Home Header Title',
                'description' => 'Home Header Title',
                'value' => 'PT. AISIN INDONESIA AUTOMOTIVE',
                'type' => 'text'
            ],
            [
                'name' => 'home_header_sub_title',
                'display_name' => 'Home Header Sub Title',
                'description' => 'Home Header Sub Title',
                'value' => 'Automotive Component Manufacturing Company',
                'type' => 'text'
            ]
        ];

        DB::table('AIIASettings')->insert($AIIASettings);
    }
}
