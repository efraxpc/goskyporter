<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Exports\CustomersExport;
use App\Logo;
use App\Query;
use Illuminate\Http\Request;
use App\Exports\QueriesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $logo = Logo::find(1);
        $this->path = asset('storage/images').'/'.$logo->path;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = $this->path;
        return view('reports.index', compact('path'));
    }

    public function exportQueries(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $queries = Query::select([
            'queries.id',
            'query_statuses.name as query_status',
            'customers.first_name',
            'customers.last_name',
            'customers.indian_number',
            'customers.email',
            'queries.created_at',
            't1.name as origin',
            't1.data as origin_data',
            't2.name as destination',
            't2.data as destination_data',
            'users.name as user_name',
            'queries.remarks',
            'queries.created_at',
            'queries.query_date',
        ])
            ->Join('query_statuses','query_statuses.id','=','queries.query_status')
            ->Join('customers','customers.id','=','queries.customer')
            ->Join('users','users.id','=','queries.user_loggedin')
            ->Join('airports as t1','t1.id','=','queries.origin')
            ->Join('airports as t2','t2.id','=','queries.destination')
            ->whereBetween('queries.query_date', [$from, $to])
            ->orderBy('id')
            ->groupBy('queries.id')
            ->get();

        if(count($queries) == 0)
        {
            return redirect('/reports')->with('error', 'Could not find data requested!');
        }

        return Excel::download(new QueriesExport($from, $to), 'queries.xlsx');
    }

    public function exportCustomers(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $customers = Customer::select([
            'customers.id',
            'customers.first_name',
            'customers.last_name',
            'customers.indian_number',
            'customers.email',
        ])
            ->whereBetween('customers.created_at', [$from, $to])
            ->orderBy('id')
            ->groupBy('customers.id')
            ->get();

        if(count($customers) == 0)
        {
            return redirect('/reports')->with('error', 'Could not find data requested!');
        }

        return Excel::download(new CustomersExport($from, $to), 'customers.xlsx');
    }
}
