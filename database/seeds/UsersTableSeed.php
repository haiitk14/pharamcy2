<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();
        $user = new User();
        $user->name = 'Super Administrator';
        $user->username = 'superadmin';
        $user->email = '';
        $user->password = Hash::make('password');
        $user->roles_code = 'super-admin';
        $user->save();

        $user2 = new User();
        $user2->name = 'Administrator';
        $user2->username = 'admin';
        $user2->email = '';
        $user2->password = Hash::make('password');
        $user2->roles_code = 'admin';
        $user2->save();
    }
}
