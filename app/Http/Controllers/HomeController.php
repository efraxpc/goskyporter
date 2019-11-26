<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Notification;
use App\Query;
use App\User;
use Illuminate\Support\Facades\DB;

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

        $notifications = DB::table('notifications')->select('content', 'created_at')->limit(10)->orderBy('id', 'desc')->get();

        $solds = Query::select([
            'queries.id',
            'query_statuses.name as query_status',
        ])
            ->Join('query_statuses','query_statuses.id','=','queries.query_status')
            ->orderBy('id')
            ->groupBy('queries.id')
            ->Where('query_statuses.name','Sold')
            ->get();

        $holds = Query::select([
            'queries.id',
            'query_statuses.name as query_status',
        ])
            ->Join('query_statuses','query_statuses.id','=','queries.query_status')
            ->orderBy('id')
            ->groupBy('queries.id')
            ->Where('query_statuses.name','Hold')
            ->get();

        $losts = Query::select([
            'queries.id',
            'query_statuses.name as query_status',
        ])
            ->Join('query_statuses','query_statuses.id','=','queries.query_status')
            ->orderBy('id')
            ->groupBy('queries.id')
            ->Where('query_statuses.name','Lost')
            ->get();


        $agents = User::select([
            'users.id',
        ])
            ->orderBy('id')
            ->Where('users.role',3)
            ->get();

        $solds = count($solds);
        $holds = count($holds);
        $losts = count($losts);
        $agents = count($agents);

        return view('pages.home', compact('path','notifications','solds','holds','losts','agents'));
    }
}
