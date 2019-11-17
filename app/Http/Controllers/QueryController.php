<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airport;
use App\BookingSource;
use App\BookingType;
use App\Query;
use App\QueryStatus;
use App\QueryType;
use App\VisaStatus;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function create_home()
    {
        return view('queries.create_home');
    }
    public function new()
    {
        $querystatuses = QueryStatus::all();
        $bookingsources = BookingSource::all();
        $bookingtypes = BookingType::all();
        $querytypes = QueryType::all();
        $airports = Airport::all();
        $visastatuses = VisaStatus::all();
        $airlines = Airline::all();

        return view('queries.create', compact('querystatuses',
        'bookingsources',
        'bookingtypes',
        'querytypes',
        'airports',
        'visastatuses',
        'airlines'
        ));
    }
}
