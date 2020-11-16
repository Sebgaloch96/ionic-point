<?php

namespace App\Http\Controllers\Hub;

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

    public function index()
    {
        $user = auth()->user()->with(['roles', 'address'])->first();
        
        return view('hub.jobs.index')->with([
            'authedUser' => $user
        ]);
    }

    public function manage()
    {
        return view('hub.jobs.manage');
    }

    public function create() 
    {        
        return view('hub.jobs.form');
    }
}
