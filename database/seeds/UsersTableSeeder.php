<?php

use App\Job;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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
        // Get roles
        $roles = Role::all()->pluck('name');

        $user = factory(User::class)->create([      
            'name' => 'Seb Galoch',
            'email' => 'sg@example.com',
            'password' => Hash::make('secret')
        ]);
        $user->assignRole($roles);
        $job = Job::inRandomOrder()->first();
        $user->jobs()->attach($job);

        $user = factory(User::class)->create([      
            'name' => 'Thanawan Pinlaem',
            'email' => 'tp@example.com',
            'password' => Hash::make('secret')
        ]);
        $user->assignRole($roles);
        $job = Job::inRandomOrder()->first();
        $user->jobs()->attach($job);
    }
}
