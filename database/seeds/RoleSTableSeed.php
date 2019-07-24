<?php

use Illuminate\Database\Seeder;
use App\Model\Roles;

class RoleSTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::query()->delete();
        $superadmin = Roles::create([
            'code' => 'super-admin',
            'name' => 'Supper Administrator', 
        ]);
        $admin = Roles::create([
            'code' => 'admin',
            'name' => 'Administrator', 
        ]);
        $user = Roles::create([
            'code' => 'user',
            'name' => 'User', 
        ]);
    }
}
