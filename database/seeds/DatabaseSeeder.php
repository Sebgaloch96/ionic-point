<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class); // Must be called before the UsersTableSeeder
        $this->call(UsersTableSeeder::class);
    }
}
