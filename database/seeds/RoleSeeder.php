<?php

use Illuminate\Database\Seeder;
use App\Role as Model;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['name' => 'Administrator'],
            ['name' => 'User']
        ];

        Model::insert($roles);
    }
}
