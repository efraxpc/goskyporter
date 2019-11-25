<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logo = Logo::find(1);
        $path = asset('storage/images').'/'.$logo->path;


        $notifications = Notification::all()->take(10);

        return view('pages.home', compact('path','notifications'));
    }
}
