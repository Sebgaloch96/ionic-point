<?php

namespace App\Http\Controllers\Hub\Api;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobIndexResource;

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
        $user = auth()->user();
        $jobs = Job::with(['address', 'bookmarks']);
        
        // Filters
        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $jobs->sort($sort);
        }

        return JobIndexResource::collection($jobs->paginate(20), $user);
    }

    public function myJobs(Request $request) 
    {
        $user = auth()->user();
        $jobs = $user->jobs()->with(['address', 'bookmarks']);

        // Filters
        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $jobs->sort($sort);
        }

        return JobIndexResource::collection($jobs->paginate(20), $user);
    }
}
