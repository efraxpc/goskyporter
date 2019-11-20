<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airport;
use App\BookingSource;
use App\BookingType;
use App\Customer;
use App\Query;
use App\QueryStatus;
use App\QueryType;
use App\VisaStatus;
use Illuminate\Http\Request;
use \stdClass;
use Yajra\Datatables\Datatables;

class QueryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getIndex()
    {
        if(request()->ajax()) {
            $queries = Query::select([
                'queries.id',
                'query_statuses.name as query_status',
                'customers.first_name',
                'customers.last_name',
                'customers.indian_number',
                'queries.created_at',
                't1.name as origin',
                't1.data as origin_data',
                't2.name as destination',
                't2.data as destination_data',
                'users.name as user_name',
                'queries.remarks',
            ])
                ->Join('query_statuses','query_statuses.id','=','queries.query_status')
                ->Join('customers','customers.id','=','queries.customer')
                ->Join('users','users.id','=','queries.user_loggedin')
                ->Join('airports as t1','t1.id','=','queries.origin')
                ->Join('airports as t2','t2.id','=','queries.destination')
                ->orderBy('id')
                ->groupBy('queries.id')
                ->get();

            foreach ($queries as $query) {
                $remarks = unserialize($query->remarks);
                $query->remarks = $remarks;
            }

            return Datatables::of($queries)
                ->addColumn('action', function ($query) {
                    return '<div class="text-center"><a href="/queries/'.$query->id.'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-eye"></i> View</a> <a href="/queries/edit/'.$query->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/queries/delete/'.$query->id.'" class="btn btn-xs btn-danger m-2"><i class="glyphicon glyphicon-edit"></i> Delete</a></div>';
                })
                ->make(true);
        }
        return view('queries.list');
    }
    public function create_home()
    {
        return view('queries.create_home');
    }
    public function create_without_customer()
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
        if(!$request->get('customer_id')) {
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'us_phone_number'=>'required',
                'us_alternate_phone_number'=>'required',
                'indian_phone'=>'required',
                'email'=>'required',
                'query_status'=>'required',
                'query_date'=>'required',
                'query_type'=>'required',
                'booking_type'=>'required',
                'origin'=>'required',
                'destination'=>'required',
                'departure_date'=>'required',
                'arrival_date'=>'required',
                'passengerdetails'=>'required',
                'remarks'=>'required',
                'bookingsource'=>'required',
                'visa_status'=>'required',
                'airline'=>'required',
            ]);
        }else{
            $request->validate([
                'query_status'=>'required',
                'query_date'=>'required',
                'query_type'=>'required',
                'booking_type'=>'required',
                'origin'=>'required',
                'destination'=>'required',
                'departure_date'=>'required',
                'arrival_date'=>'required',
                'passengerdetails'=>'required',
                'remarks'=>'required',
                'bookingsource'=>'required',
                'visa_status'=>'required',
                'airline'=>'required',
            ]);
        }
        foreach($request->get('remarks') as $key => $value){
            $remarks_array[] = $value;
        }
        $convertedObj = $this->ToObject($remarks_array);
        $serialized_object = serialize($convertedObj);

        $customerId = $request->get('customer_id');

        if(!$request->get('customer_id'))
        {
            $customer = new Customer([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'us_phone_number' => $request->get('us_phone_number'),
                'us_alternate_number' => $request->get('us_alternate_phone_number'),
                'indian_number' => $request->get('indian_phone'),
                'email' => $request->get('email'),
            ]);
            $customer->save();

            $customerId = $customer->id;
        }

        $query = new Query([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'us_phone_number' => $request->get('us_phone_number'),
            'us_alternate_phone_number' => $request->get('us_alternate_phone_number'),
            'indian_phone' => $request->get('indian_phone'),
            'email' => $request->get('email'),
            'query_status' => $request->get('query_status'),
            'query_date' => $request->get('query_date'),
            'querytype' => $request->get('query_type'),
            'bookingtype' => $request->get('booking_type'),
            'origin' => $request->get('origin'),
            'destination' => $request->get('destination'),
            'departure_date' => $request->get('departure_date'),
            'arrival_date' => $request->get('arrival_date'),
            'passenger_details' => $request->get('passengerdetails'),
            'bookingsource' => $request->get('bookingsource'),
            'visastatus' => $request->get('visa_status'),
            'airline' => $request->get('airline'),
            'user_loggedin' => auth()->user()->id,
            'remarks' => $serialized_object,
            'customer' => $customerId,
        ]);
        $query->save();

        return redirect('queries')->with('success', 'Query saved!');
    }

    public function create_with_customer_index()
    {
        if(request()->ajax()) {
            $customers = Query::select([
                'customers.id',
                'customers.first_name',
                'customers.last_name',
                'customers.indian_number',
                'customers.us_phone_number',
                'customers.email',
                'users.name as handled_by',
            ])
                ->Join('customers','customers.id','=','queries.customer')
                ->Join('users','users.id','=','queries.user_loggedin')
                ->orderBy('id')
                ->groupBy('customers.id')
                ->get();
            return Datatables::of($customers)
                ->addColumn('action', function ($customer) {
                    return '<div class="text-center"><a href="/query/create-with-customer/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Choose</a></div>';
                })
                ->make(true);
        }
        return view('queries.create_with_customer_index');
    }

    public function create_with_customer($customerId)
    {
        $querystatuses = QueryStatus::all();
        $bookingsources = BookingSource::all();
        $bookingtypes = BookingType::all();
        $querytypes = QueryType::all();
        $airports = Airport::all();
        $visastatuses = VisaStatus::all();
        $airlines = Airline::all();

        return view('queries.create_with_customer', compact('querystatuses',
            'bookingsources',
            'bookingtypes',
            'querytypes',
            'airports',
            'visastatuses',
            'airlines',
            'customerId'
        ));
    }

    function ToObject($Array) {

        // Clreate new stdClass object
        $object = new stdClass();

        // Use loop to convert array into object
        foreach ($Array as $key => $value) {
            if (is_array($value)) {
                $value = ToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }

    public function destroy($id)
    {
        $query = Query::find($id);
        $query->delete();

        return redirect('/queries')->with('success', 'Query deleted!');
    }

    public function view($id)
    {
        $query = Query::find($id);

        $querystatuses = QueryStatus::all();
        $bookingsources = BookingSource::all();
        $bookingtypes = BookingType::all();
        $querytypes = QueryType::all();
        $airports = Airport::all();
        $visastatuses = VisaStatus::all();
        $airlines = Airline::all();

        $remarks = unserialize($query->remarks);

        $customer = Customer::find($query->customer);

        return view('queries.view', compact('querystatuses',
            'bookingsources',
            'bookingtypes',
            'querytypes',
            'airports',
            'visastatuses',
            'airlines',
            'query',
            'customer',
            'remarks'
        ));
    }
}
