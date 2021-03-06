@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Edit Query information</h3>
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
                    <input type="hidden" id="user_role" value="{{Auth::user()->role }}">
                <form method="post" action="{{ route('queries_update') }}">
                    @csrf
                    <input type="hidden" name="queryId" value="{{$queryId}}">
                    <input type="hidden" name="customer_id" value="{{$customer->id}}">
                    <input type="hidden" name="slugBookingtypeSelected" id="slugBookingtypeSelected" value="{{$slugBookingtypeSelected}}">
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
                                        <input type="text" class="form-control" name="first_name" value="{{$customer->first_name}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name:</label>
                                        <input type="text" class="form-control" name="last_name" value="{{$customer->last_name}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_phone_number">US phone number:</label>
                                        <input type="text" class="form-control" name="us_phone_number" value="{{$customer->us_phone_number}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_alternate_phone_number">US alternate phone number:</label>
                                        <input type="text" class="form-control" name="us_alternate_phone_number" value="{{$customer->us_alternate_number}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="indian_phone">Indian phone:</label>
                                        <input type="text" class="form-control" name="indian_phone" value="{{$customer->indian_number}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email" value="{{$customer->email}}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
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
                                        <select class="query_status" name="query_status" style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <input type="date" class="form-control" name="query_date" value="{{ date('Y-m-d',strtotime($query->query_date)) }}" required @if(Auth::user()->role == 3) readonly="true"@endif>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bookingsource">Sources/Referals:</label>
                                        <select class="booking_source" name="bookingsource" style="width: 100%" value="{{ $query->bookingsource  }}" @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <select class="query_type" name="query_type" style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <select class="booking_type" name="booking_type" id="booking_type"  style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
                                            <option value="">-- Select --</option>
                                            @foreach($bookingtypes as $bookingtype_var)
                                                <option value="{{$bookingtype_var->id}}" @if($query->bookingtype == $bookingtype_var->id) data-slug="{{$bookingtype_var->slug}}" selected @endif >{{$bookingtype_var->name}}</option>
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
                                        <select class="origin" name="origin" style="width: 100%" required >
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
                                        <select class="destination" name="destination" style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <input type="date" class="form-control" name="departure_date" value="{{ date('Y-m-d',strtotime($query->departure_date)) }}" required @if(Auth::user()->role == 3) readonly="true"@endif/>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="arrival_date">Arrival date:</label>
                                        <input type="date" class="form-control" name="arrival_date" id="arrival_date" value=@if(!is_null ($query->arrival_date) ) {{ date('Y-m-d',strtotime($query->arrival_date)) }} @endif required />
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="visa_status">Visa status:</label>
                                        <select class="visa_status" name="visa_status" style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <select class="airline" name="airline" style="width: 100%" required @if(Auth::user()->role == 3) readonly="true"@endif>
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
                                        <textarea class="form-control" id="passengerdetails" name="passengerdetails" rows="3" @if(Auth::user()->role == 3) readonly="true"@endif>{{$query->passenger_details}}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="destination">Remarks:</label>
                                        <div class="field_wrapper">
                                            <div>
                                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-square" style="color:green"></i></a>
                                                @foreach($remarks as $remark)
                                                    <div>
                                                        <input type="text" class="form-control" name="remarks[]" value="{{$remark}}" />
                                                        <a href="javascript:void(0);" class="remove_button"><i class="fas fa-times" style="color:red"></i></a>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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

        if($('#user_role').val() == 3)
        {
            $(".booking_source").prop("disabled", true);
            $(".query_type").prop("disabled", true);
            $(".query_status").prop("disabled", true);
            $(".booking_type").prop("disabled", true);
            $(".origin").prop("disabled", true);
            $(".destination").prop("disabled", true);
            $(".visa_status").prop("disabled", true);
            $(".airline").prop("disabled", true);
        }

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

        if($('#slugBookingtypeSelected').val() === 'one-way')
        {
            document.getElementById('arrival_date').disabled = true;
        }

        $('.booking_type').on('select2:select', function (e) {
            var data = e.params.data;
            var slug = slugify(data.text)
            if(slug === 'one-way')
            {
                document.getElementById('arrival_date').disabled = true;
                document.getElementById('arrival_date').required = '';
                document.getElementById("arrival_date").valueAsDate = null;
            }else {
                document.getElementById('arrival_date').disabled = false;
                document.getElementById('arrival_date').required = 'required';
            }
        });

        function slugify(string) {
            const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;'
            const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------'
            const p = new RegExp(a.split('').join('|'), 'g')

            return string.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
                .replace(/&/g, '-and-') // Replace & with 'and'
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
        }

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    </script>

@endsection

