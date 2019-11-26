@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Query information</h3>
            <div class="row">
                <div class="col-12">
                    Query N° {{$query->id}}
                </div>
            </div>
            <hr>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br />
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
                                        <input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}" required readonly="true"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name:</label>
                                        <input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}" required readonly="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_phone_number">US phone number:</label>
                                        <input type="text" class="form-control" name="us_phone_number" value="{{$customer->us_phone_number}}" required readonly="true"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_alternate_phone_number">US alternate phone number:</label>
                                        <input type="text" class="form-control" name="us_alternate_phone_number" value="{{$customer->us_alternate_number}}" required readonly="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="indian_phone">Indian phone:</label>
                                        <input type="text" class="form-control" name="indian_phone" value="{{$customer->indian_number}}" required readonly="true"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" value="{{$customer->email}}" required readonly="true"/>
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
                                        <select class="query_status" name="query_status" style="width: 100%" required readonly="true">
                                            <option value="">-- Select --</option>
                                            @foreach($querystatuses as $querystatus_var)
                                                <option value="{{$querystatus_var->id}}" @if($query->query_status == $querystatus_var->id) selected @endif>{{$querystatus_var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_date">Query date:</label>
                                        <input type="date" class="form-control" name="query_date" value="{{ date('Y-m-d',strtotime($query->query_date)) }}" required readonly="true">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bookingsource">Sources/Referals:</label>
                                        <select class="booking_source" name="bookingsource" style="width: 100%" value="{{ $query->bookingsource  }}">
                                            <option value="">-- Select --</option>
                                            @foreach($bookingsources as $bookingsource_var)
                                                <option value="{{$bookingsource_var->id}}" @if($query->bookingsource == $bookingsource_var->id) selected @endif> {{$bookingsource_var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_type">Query type:</label>
                                        <select class="query_type" name="query_type" style="width: 100%" required>
                                            <option value="">-- Select --</option>
                                            @foreach($querytypes as $querytype_var)
                                                <option value="{{$querytype_var->id}}" @if($query->querytype == $querytype_var->id) selected @endif>{{$querytype_var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="booking_type">Booking type:</label>
                                        <select class="booking_type" name="booking_type" style="width: 100%" required>
                                            <option value="">-- Select --</option>
                                            @foreach($bookingtypes as $bookingtype_var)
                                                <option value="{{$bookingtype_var->id}}" @if($query->bookingtype == $bookingtype_var->id) selected @endif >{{$bookingtype_var->name}}</option>
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
                                        <select class="origin" name="origin" style="width: 100%" required>
                                            <option value="">-- Select --</option>
                                            @foreach($airports as $airport_var)
                                                <option value="{{$airport_var->id}}" @if($query->origin == $airport_var->id) selected @endif >{{$airport_var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="destination">Destination:</label>
                                        <select class="destination" name="destination" style="width: 100%" required>
                                            <option value="">-- Select --</option>
                                            @foreach($airports as $airport_var)
                                                <option value="{{$airport_var->id}}" @if($query->destination == $airport_var->id) selected @endif >{{$airport_var->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="departure_date">Departure date:</label>
                                        <input type="date" class="form-control" name="departure_date" value="{{ date('Y-m-d',strtotime($query->departure_date)) }}" required readonly="true"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="arrival_date">Arrival date:</label>
                                        <input type="date" class="form-control" name="arrival_date" value="{{ date('Y-m-d',strtotime($query->arrival_date)) }}"required readonly="true"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status:</label>
                                        <select class="visa_status" name="visa_status" style="width: 100%" required>
                                            <option value="">-- Select --</option>
                                            @foreach($visastatuses as $visastatus_var)
                                                <option value="{{$visastatus_var->id}}" @if($query->visastatus == $visastatus_var->id) selected @endif >{{$visastatus_var->status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="airline">Airline preference:</label>
                                        <select class="airline" name="airline" style="width: 100%"required>
                                            <option value="">-- Select --</option>
                                            @foreach($airlines as $airline_var)
                                                <option value="{{$airline_var->id}}" @if($query->airline == $airline_var->id) selected @endif >{{$airline_var->name}}</option>
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
                                        <textarea class="form-control" id="passengerdetails" name="passengerdetails" rows="3" readonly="true">{{$query->passenger_details}}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="destination">Remarks:</label>
                                        <div class="field_wrapper">
                                            <div>
                                                @foreach($remarks as $remark)
                                                    <input type="text" class="form-control" name="remarks[]" value="{{$remark}}" readonly="true"/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.query_status').select2();
        $(".query_status").prop("disabled", true);
        $('.booking_source').select2();
        $(".booking_source").prop("disabled", true);
        $('.query_type').select2();
        $(".query_type").prop("disabled", true);
        $('.booking_type').select2();
        $(".booking_type").prop("disabled", true);
        $('.origin').select2();
        $(".origin").prop("disabled", true);
        $('.destination').select2();
        $(".destination").prop("disabled", true);
        $('.visa_status').select2();
        $(".visa_status").prop("disabled", true);
        $('.airline').select2();
        $(".airline").prop("disabled", true);

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
    </script>

@endsection
