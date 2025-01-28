<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	['name' => 'admin', 'email' => 'administrator@aiia.co.id', 'password' => Hash::make('Kiic2014')],
        	['name' => 'hrd', 'email' => 'hrd@aiia.co.id', 'password' => Hash::make('Kiic2014')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }

}
