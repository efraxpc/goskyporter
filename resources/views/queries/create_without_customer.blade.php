@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Create Query without customer</h3>
            <hr>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('save_query') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Customer data</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">Frist name:</label>
                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name:</label>
                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_phone_number">US phone number:</label>
                                        <input type="text" class="form-control" name="us_phone_number" value="{{ old('us_phone_number') }}"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_alternate_phone_number">US alternate phone number:</label>
                                        <input type="text" class="form-control" name="us_alternate_phone_number" value="{{ old('us_alternate_phone_number') }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="indian_phone">Indian phone:</label>
                                        <input type="text" class="form-control" name="indian_phone" value="{{ old('indian_phone') }}"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Query specification</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_status">Query status:</label>
                                        <select class="query_status" name="query_status" style="width: 100%" value="{{ old('query_status') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($querystatuses as $querystatus)
                                                <option value="{{$querystatus->id}}">{{$querystatus->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_date">Query date:</label>
                                        <input type="date" class="form-control" name="query_date" value="{{ old('query_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bookingsource">Sources/Referals:</label>
                                        <select class="booking_source" name="bookingsource" style="width: 100%" value="{{ old('bookingsource') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($bookingsources as $bookingsource)
                                                <option value="{{$bookingsource->id}}">{{$bookingsource->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_type">Query type:</label>
                                        <select class="query_type" name="query_type" style="width: 100%" value="{{ old('query_type') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($querytypes as $querytype)
                                                <option value="{{$querytype->id}}">{{$querytype->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="booking_type">Booking type:</label>
                                        <select class="booking_type" name="booking_type" style="width: 100%" value="{{ old('booking_type') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($bookingtypes as $bookingtype)
                                                <option value="{{$bookingtype->id}}">{{$bookingtype->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Travel preference</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="origin">Origin:</label>
                                        <select class="origin" name="origin" style="width: 100%" value="{{ old('origin') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($airports as $airport)
                                                <option value="{{$airport->id}}">{{$airport->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="destination">Destination:</label>
                                        <select class="destination" name="destination" style="width: 100%" value="{{ old('destination') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($airports as $airport)
                                                <option value="{{$airport->id}}">{{$airport->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="departure_date">Departure date:</label>
                                        <input type="date" class="form-control" name="departure_date"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="arrival_date">Arrival date:</label>
                                        <input type="date" class="form-control" name="arrival_date"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status:</label>
                                        <select class="visa_status" name="visa_status" style="width: 100%" value="{{ old('visa_status') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($visastatuses as $visastatus)
                                                <option value="{{$visastatus->id}}">{{$visastatus->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="airline">Airline preference:</label>
                                        <select class="airline" name="airline" style="width: 100%" value="{{ old('airline') }}">
                                            <option value="">-- Select --</option>
                                            @foreach($airlines as $airline)
                                                <option value="{{$airline->id}}">{{$airline->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5>Passenger details</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="passengerdetails">Passenger details</label>
                                        <textarea class="form-control" id="passengerdetails" name="passengerdetails" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="destination">Remarks:</label>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" class="form-control" name="remarks[]" value=""/>
                                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-square" style="color:green"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    $('.query_status').select2();
    $('.booking_source').select2();
    $('.query_type').select2();
    $('.booking_type').select2();
    $('.origin').select2();
    $('.destination').select2();
    $('.visa_status').select2();
    $('.airline').select2();


    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" class="form-control" name="remarks[]" value=""/><a href="javascript:void(0);" class="remove_button"><i class="fas fa-times" style="color:red"></i></a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
    //Check maximum number of input fields
    if(x < maxField){
    x++; //Increment field counter
    $(wrapper).append(fieldHTML); //Add field html
    }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
    e.preventDefault();
    $(this).parent('div').remove(); //Remove field html
    x--; //Decrement field counter
    });
@endsection
