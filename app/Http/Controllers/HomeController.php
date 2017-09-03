<?php

namespace App\Http\Controllers;

use App\Career;
use App\Post;
use App\Team;
use App\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }
}
