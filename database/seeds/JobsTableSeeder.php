<?php

use App\Job;
use App\Address;
use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = factory(Job::class, 20)->create();

        foreach ($jobs as $job) {
            $address = factory(Address::class)->create([
                'addressable_id' => $job->id,
                'addressable_type' => Job::class
            ]);
        }
    }
}
