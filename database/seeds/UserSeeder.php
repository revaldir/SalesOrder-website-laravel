<?php

use Illuminate\Database\Seeder;
use App\User as Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'Admin_Pladi',
                'username' => 'admin',
                'email' => 'admin@pladi.com',
                'password' => \Hash::make('123456789'),
                'role_id' => 1,
                'is_active' => true,
            ],
        ];

        Model::insert($user);
    }
}
