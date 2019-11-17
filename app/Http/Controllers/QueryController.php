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
            'querystatus'=>'required',
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
            'bookingsource'=>'required',
        ]);

        $airport = new Query([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'us_phone_number' => $request->get('us_phone_number'),
            'us_alternate_phone_number' => $request->get('us_alternate_phone_number'),
            'indian_phone' => $request->get('indian_phone'),
            'email' => $request->get('email'),
            'querystatus' => $request->get('querystatus'),
            'query_date' => $request->get('query_date'),
            'booking_source' => $request->get('booking_source'),
            'query_type' => $request->get('query_type'),
            'booking_type' => $request->get('booking_type'),
            'origin' => $request->get('origin'),
            'destination' => $request->get('destination'),
            'departure_date' => $request->get('departure_date'),
            'arrival_date' => $request->get('arrival_date'),
            'passengerdetails' => $request->get('passengerdetails'),
            'bookingsource' => $request->get('bookingsource'),
        ]);
        $airport->save();
        return view('queries.create_home');
    }
}
