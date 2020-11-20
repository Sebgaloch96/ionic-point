<?php

namespace App\Http\Controllers\Hub\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
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

    public function get(Request $request) 
    {
        // Todo
    }

    public function upload(Request $request)
    {
        dd($request->file('files'));
    }
}