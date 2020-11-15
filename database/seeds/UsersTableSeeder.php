<?php

use App\Job;
use App\User;
use App\Address;
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

        // Super Admins
        $superAdmin = factory(User::class)->create([      
            'name' => 'Seb Galoch',
            'email' => 'sg@example.com',
            'password' => Hash::make('secret')
        ]);
        // Add roles
        $superAdmin->assignRole($roles);
        // Add an address
        $address = factory(Address::class)->create([
            'addressable_id' => $superAdmin->id,
            'addressable_type' => User::class
        ]);
        // Add a job
        $job = Job::inRandomOrder()->first();
        $superAdmin->jobs()->attach($job);

        $superAdmin = factory(User::class)->create([      
            'name' => 'Thanawan Pinlaem',
            'email' => 'tp@example.com',
            'password' => Hash::make('secret')
        ]);
        // Add roles
        $superAdmin->assignRole($roles);
        // Add an address
        $address = factory(Address::class)->create([
            'addressable_id' => $superAdmin->id,
            'addressable_type' => User::class
        ]);
        // Add a job
        $job = Job::inRandomOrder()->first();
        $superAdmin->jobs()->attach($job);

        // Other users
        $users = factory(User::class, 20)->create();
        $roles = Role::where('name', '!=', 'Super Admin')->pluck('name');
        foreach ($users as $user) {
            // Assign a role
            $randomRoles = $roles[rand(0, count($roles) - 1)];
            $user->assignRole($randomRoles);

            // Link to an address
            $address = factory(Address::class)->create([
                'addressable_id' => $user->id,
                'addressable_type' => User::class
            ]);

            // Attach a job
            $job = Job::inRandomOrder()->first();
            $user->jobs()->attach($job);
        }
    }
}
