<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function home() 
    {
        return view('site.home');
    }

    public function membership()
    {
        return view('site.membership');
    }

    public function aboutUs()
    {
        return view('site.aboutUs');
    }

    public function contactUs()
    {
        return view('site.contactUs');
    }
}
