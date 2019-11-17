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
    public function create_with_customer()
    {
        $querystatuses = QueryStatus::all();
        $bookingsources = BookingSource::all();
        $bookingtypes = BookingType::all();
        $querytypes = QueryType::all();
        $airports = Airport::all();
        $visastatuses = VisaStatus::all();
        $airlines = Airline::all();

        return view('queries.create_without_customer', compact('querystatuses',
        'bookingsources',
        'bookingtypes',
        'querytypes',
        'airports',
        'visastatuses',
        'airlines'
        ));
    }
    public function save(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'us_phone_number'=>'required',
            'us_alternate_phone_number'=>'required',
            'indian_phone'=>'required',
            'email'=>'required',
            'query_status'=>'required',
            'query_date'=>'required',
            'booking_source'=>'required',
            'query_type'=>'required',
            'booking_type'=>'required',
            'origin'=>'required',
            'destination'=>'required',
            'departure_date'=>'required',
            'arrival_date'=>'required',
            'passengerdetails'=>'required',
            'remarks'=>'required',
        ]);
        return view('queries.create_home');
    }
}
