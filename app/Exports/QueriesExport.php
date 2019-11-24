<?php

namespace App\Exports;

use App\Query;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class QueriesExport implements FromView
{
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
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
        ->whereBetween('queries.query_date', [$this->from, $this->to])
        ->orderBy('id')
        ->groupBy('queries.id')
        ->get();

        foreach ($queries as $key => $value)
        {
            $unserialized_remarks[] = unserialize($value->remarks);
        }

        return view('exports.queries', [
            'queries' => $queries,
            'unserializedRemarks' => $unserialized_remarks
        ]);
    }


}
