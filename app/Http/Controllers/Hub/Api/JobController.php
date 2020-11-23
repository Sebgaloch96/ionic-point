<?php

namespace App\Http\Controllers\Hub\Api;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobSaveRequest;
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
        $jobs = Job::with(['address']);
        
        // Filters
        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }
        if ($bounds = $request->input('range-filter')) {
            $decodedBounds = json_decode($bounds);
            $jobs->withinLatLngBounds($decodedBounds);
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $jobs->sort($sort);
        }

        return JobIndexResource::collection($jobs->paginate(20));
    }

    public function myJobs(Request $request) 
    {
        $user = auth()->user();
        $jobs = $user->jobs()->with(['address']);

        // Filters
        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }
        if ($bounds = $request->input('range-filter')) {
            $decodedBounds = json_decode($bounds);
            $jobs->withinLatLngBounds($decodedBounds);
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $jobs->sort($sort);
        }

        return JobIndexResource::collection($jobs->paginate(20));
    }

    public function myBookmarks(Request $request) 
    {
        $jobs = Job::query()->bookmarkedByUser()->with(['address']);

        // Filters
        if ($keyword = $request->input('search-filter')) {
            $jobs->search($keyword);
        }
        if ($bounds = $request->input('range-filter')) {
            $decodedBounds = json_decode($bounds);
            $jobs->withinLatLngBounds($decodedBounds);
        }

        // Sorting
        if ($sort = $request->input('sort')) {
            $jobs->sort($sort);
        }

        return JobIndexResource::collection($jobs->paginate(20));
    }

    public function bookmark(Job $job)  
    {
        $user = auth()->user();

        if ($job->isBookmarked()) {
            $job->removeBookmark();

            $alert = ['title' => 'Bookmark Removed'];
        } else {
            $job->bookmark();

            $alert = ['title' => 'Bookmark Added'];
        }
        
        return response()->json($alert);
    }

    public function create(JobSaveRequest $request)
    {
        dd($request->all());
        return response()->json([
            'alert' => [
                'title' => 'Job Created!',
                'text' => '',
                'icon' => 'success'
            ],
            'errors' => [

            ]
        ]);
    }
}
