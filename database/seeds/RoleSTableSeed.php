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
        $author = Roles::create([
            'code' => 'super-admin',
            'name' => 'Supper Administrator', 
        ]);
        $editor = Roles::create([
            'code' => 'admin',
            'name' => 'Administrator', 
        ]);
    }
}
