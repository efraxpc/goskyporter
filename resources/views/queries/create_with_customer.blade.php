@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
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
                    <input type="hidden" value="{{$customerId}}" name="customer_id">
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
                                        <select class="query_status" name="query_status" style="width: 100%" value="{{ old('query_status') }}" required>
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
                                        <input type="date" class="form-control" name="query_date" value="{{ old('query_date') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bookingsource">Sources/Referals:</label>
                                        <select class="booking_source" name="bookingsource" style="width: 100%" value="{{ old('bookingsource') }}" required>
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
                                        <select class="query_type" name="query_type" style="width: 100%" value="{{ old('query_type') }}" required>
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
                                        <select class="booking_type" name="booking_type" style="width: 100%" value="{{ old('booking_type') }}" required>
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
                                        <select class="origin" name="origin" style="width: 100%" value="{{ old('origin') }}" required>
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
                                        <select class="destination" name="destination" style="width: 100%" value="{{ old('destination') }}" required>
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
                                        <input type="date" class="form-control" name="departure_date" required/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="arrival_date">Arrival date:</label>
                                        <input type="date" class="form-control" name="arrival_date" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status:</label>
                                        <select class="visa_status" name="visa_status" style="width: 100%" value="{{ old('visa_status') }}" required>
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
                                        <select class="airline" name="airline" style="width: 100%" value="{{ old('airline') }}" required>
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
                                        <textarea class="form-control" id="passengerdetails" name="passengerdetails" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="remarks">Remarks:</label>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" class="form-control" name="remarks[]" value="" required/>
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
    <script>
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
    </script>

@endsection

