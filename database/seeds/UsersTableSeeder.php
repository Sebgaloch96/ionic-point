<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(App\User::class)->createMany([
            [
                'name' => 'Seb Galoch',
                'email' => 'sg@example.com',
                'password' => Hash::make('secret')
            ],
            [
                'name' => 'Thanawan Pinlaem',
                'email' => 'tp@example.com',
                'password' => Hash::make('secret')
            ]
        ]);
    }
}
