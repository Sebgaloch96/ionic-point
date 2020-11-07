<?php

namespace App\Http\Controllers\Hub\Api;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function listed() 
    {
        $jobs = Job::with('address')->orderBy('created_at', 'desc')->get();

        return response()->json([
            'jobs' => $jobs
        ]);
    }

    public function myJobs() 
    {
        $jobs = auth()->user()->jobs;

        return response()->json([
            'jobs' => $jobs
        ]);
    }
}
