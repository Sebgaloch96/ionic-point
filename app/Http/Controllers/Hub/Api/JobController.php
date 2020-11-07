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
    
    public function listed(Request $request) 
    {
        $jobs = Job::with('address')->orderBy('created_at', 'desc');

        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }

        return $jobs->paginate(20);
    }

    public function myJobs(Request $request) 
    {
        $user =  auth()->user();
        $jobs = $user->jobs()->with('address');

        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }

        return $jobs->paginate(20);
    }
}
