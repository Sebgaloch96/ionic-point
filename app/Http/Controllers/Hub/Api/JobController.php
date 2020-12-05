<?php

namespace App\Http\Controllers\Hub\Api;

use App\Job;
use App\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobSaveRequest;
use App\Http\Resources\JobIndexResource;
use Carbon\Carbon;
use DataTables;
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
        $jobs = Job::where('public', 1)->with(['address']);
        
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
        $jobs = $user->jobs()->with(['address'])->where('public', 1);

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
        $jobs = Job::where('public', 1)->bookmarkedByUser()->with(['address']);

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
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->status = 'Available';
        $job->start_date = Carbon::parse($request->start_date);
        $job->end_date = Carbon::parse($request->end_date);
        $job->public = $request->public ? 1 : 0;
        $job->save();

        $address = Address::create($request->address);
        $job->address()->save($address);

        return response()->json([
            'alert' => [
                'title' => 'Job Created!',
                'text' => '',
                'icon' => 'success'
            ]
        ]);
    }

    /**
     * DataTable functions
     */

    public function loadDatatable()
    {
        $model = Job::with(['address'])->orderBy('created_at', 'asc');

        return DataTables::eloquent($model)
            ->toJson();
    }

    public function togglePublic(Job $job) 
    {   
        $job->public = !$job->public;
        $job->save();

        return response()->json([
            'type' => 'success'
        ]);
    }
}
