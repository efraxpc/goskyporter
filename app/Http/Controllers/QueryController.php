<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airport;
use App\BookingSource;
use App\BookingType;
use App\Customer;
use App\Logo;
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
        $logo = Logo::find(1);
        $this->path = asset('storage/images').'/'.$logo->path;
    }
    public function getIndex(Request $request)
    {
        if(request()->ajax()) {
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
                ->orderBy('id')
                ->groupBy('queries.id')
                ->get();

            if($request->value)
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
                    ->Where('customers.first_name', 'like', '%' . $request->value . '%')
                    ->orWhere('customers.last_name', 'like', '%' . $request->value . '%')
                    ->orWhere('customers.indian_number', 'like', '%' . $request->value . '%')
                    ->orWhere('customers.email', 'like', '%' . $request->value . '%')
                    ->orWhere('query_statuses.name', 'like', '%' . $request->value . '%')
                    ->orWhere('users.name', 'like', '%' . $request->value . '%')
                    ->orWhere('queries.id', 'like', '%' . $request->value . '%')
                    ->orderBy('id')
                    ->groupBy('queries.id')
                    ->get();
            }


            foreach ($queries as $query) {
                $remarks = unserialize($query->remarks);

                $query->remarks = $remarks;

            }

            $response =  Datatables::of($queries)
                ->addColumn('action', function ($query) {
                    return '<div class="text-center">
                    <a href="#" class="del_" data-id='.$query->id.'><i class="fas fa-plus-circle fa-2x"></i></a> 
                    <a href="/queries/edit/'.$query->id.'"><i class="far fa-edit fa-2x"></i></a>
                    <a href="/queries/'.$query->id.'"><i class="fas fa-eye fa-2x"></i></a>
                    </div>';
                })
                ->make(true);

            if(auth()->user()->role == 2)
            {
                $response = Datatables::of($queries)
                    ->addColumn('action', function ($query) {
                        return '<div class="text-center">
                            <a href="#" class="del_" data-id='.$query->id.'><i class="fas fa-plus-circle fa-2x"></i></a>
                            <a href="/queries/'.$query->id.'"><i class="fas fa-eye fa-2x"></i></a>
                            <a href="/queries/edit/'.$query->id.'"><i class="far fa-edit fa-2x"></i></a>
                            <a href="/queries/delete/'.$query->id.'"><i class="far fa-trash-alt fa-2x"></i></a>
                        </div>';
                    })
                    ->make(true);
            }

            return $response;
        }
        $path = $this->path;


        return view('queries.list', compact('path'));
    }
    public function create_home()
    {
        $path = $this->path;
        return view('queries.create_home',compact('path'));
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

        $path = $this->path;

        return view('queries.create_without_customer', compact('querystatuses',
        'bookingsources',
        'bookingtypes',
        'querytypes',
        'airports',
        'visastatuses',
        'airlines',
        'path'
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
                'passengerdetails'=>'required',
                'remarks'=>'required',
                'bookingsource'=>'required',
                'visa_status'=>'required',
                'airline'=>'required',
            ]);
        }
        foreach($request->get('remarks') as $key => $value){
            if($value)
            {
                $remarks_array[] = $value;
            }
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
            'passenger_details' => $request->get('passengerdetails'),
            'bookingsource' => $request->get('bookingsource'),
            'visastatus' => $request->get('visa_status'),
            'airline' => $request->get('airline'),
            'user_loggedin' => auth()->user()->id,
            'remarks' => $serialized_object,
            'customer' => $customerId,
        ]);

        if($request->get('arrival_date')){
            $query->arrival_date = $request->get('arrival_date');
        }
        $query->save();
        return redirect('queries')->with('success', 'Query saved!');
    }
    public function create_with_customer_index()
    {
        if(request()->ajax()) {
            $customers = Query::select([
                'customers.id as customerId',
                'customers.first_name',
                'customers.last_name',
                'customers.indian_number',
                'customers.us_phone_number',
                'customers.email',
                'users.name as handled_by',
            ])
                ->Join('customers','customers.id','=','queries.customer')
                ->Join('users','users.id','=','queries.user_loggedin')
                ->orderBy('customers.id')
                ->groupBy('customers.id')
                ->get();
            return Datatables::of($customers)
                ->addColumn('action', function ($customer) {
                    return '<div class="text-center"><a href="/query/create-with-customer/'.$customer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Choose</a></div>';
                })
                ->make(true);
        }

        $path = $this->path;
        return view('queries.create_with_customer_index', compact('path'));
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

        $path = $this->path;

        return view('queries.create_with_customer', compact('querystatuses',
            'bookingsources',
            'bookingtypes',
            'querytypes',
            'airports',
            'visastatuses',
            'airlines',
            'customerId',
        'path'
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

        $path = $this->path;

        return view('queries.view', compact('querystatuses',
            'bookingsources',
            'bookingtypes',
            'querytypes',
            'airports',
            'visastatuses',
            'airlines',
            'query',
            'customer',
            'remarks',
        'path'
        ));
    }
    public function saveRemark(Request $request)
    {
        $remark = $request->get('remark');
        $idQuery = $request->get('id_query');

        $query = Query::find($idQuery);
        $remarksSaved = unserialize($query->remarks);
        $remarksSavedArray = json_decode(json_encode($remarksSaved), true);
        $remarksSavedArray[] = $remark;

        $reamarksToSave = serialize($remarksSavedArray);
        $query->remarks = $reamarksToSave;
        $query->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function edit($id)
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

        $bookingTypeToQuery = BookingType::find($query->bookingtype);

        $slugBookingtypeSelected = $bookingTypeToQuery->slug;

        $queryId = $id;
        $path = $this->path;
        return view('queries.edit', compact('querystatuses',
            'bookingsources',
            'bookingtypes',
            'querytypes',
            'airports',
            'visastatuses',
            'airlines',
            'query',
            'customer',
            'queryId',
            'remarks',
            'slugBookingtypeSelected',
        'path'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'remarks' => 'required'
        ]);
        foreach($request->get('remarks') as $key => $value){
            if($value)
            {
                $remarks_array[] = $value;
            }
        }
        $convertedObj = $this->ToObject($remarks_array);
        $serialized_object = serialize($convertedObj);

        $customerId = $request->get('customer_id');

        $queryId = $request->get('queryId');
        $query = Query::find($queryId);
        $customer = Customer::find($customerId);

        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->us_phone_number = $request->get('us_phone_number');
        $customer->us_alternate_number = $request->get('us_alternate_phone_number');
        $customer->indian_number = $request->get('indian_phone');
        $customer->email = $request->get('email');
        $customer->save();

        if($request->get('query_status'))
        {
            $query->query_status = $request->get('query_status');
        }
        if($request->get('booking_type'))
        {
            $query->bookingtype = $request->get('booking_type');
        }
        if($request->get('origin'))
        {
            $query->origin = $request->get('origin');

        }
        if($request->get('destination'))
        {
            $query->origin = $request->get('destination');

        }
        if($request->get('bookingsource'))
        {
            $query->bookingsource = $request->get('bookingsource');
        }
        if($request->get('visa_status'))
        {
            $query->visastatus = $request->get('visa_status');
        }
        if($request->get('airline'))
        {
            $query->airline = $request->get('airline');
        }
        $query->query_date = $request->get('query_date');
        $query->querytype = $request->get('query_type');
        $query->departure_date = $request->get('departure_date');
        $query->arrival_date = $request->get('arrival_date');
        $query->passenger_details = $request->get('passengerdetails');
        $query->remarks = $serialized_object;
        $query->save();

        return redirect('queries')->with('success', 'Query updated!');
    }

    public function find(Request $request)
    {
        $path = $this->path;
        return redirect('/queries/filter/'.$request->value_to_find)->with('path', $path)->with('valueToFind', $request->value_to_find);
    }
}
