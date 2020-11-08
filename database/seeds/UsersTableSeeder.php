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
        $superAdmin = Role::where('name', 'Super Admin')->first();

        $user = factory(User::class)->create([      
            'name' => 'Seb Galoch',
            'email' => 'sg@example.com',
            'password' => Hash::make('secret')
        ]);
        $user->assignRole($superAdmin);
        $job = Job::inRandomOrder()->first();
        $user->jobs()->attach($job);
        $user->bookmark($job);

        $user = factory(User::class)->create([      
            'name' => 'Thanawan Pinlaem',
            'email' => 'tp@example.com',
            'password' => Hash::make('secret')
        ]);
        $user->assignRole($superAdmin);
        $job = Job::inRandomOrder()->first();
        $user->jobs()->attach($job);
        $user->bookmark($job);
    }
}
