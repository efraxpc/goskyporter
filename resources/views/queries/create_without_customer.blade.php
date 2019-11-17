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
                <form method="post" action="{{ route('querystatuses.store') }}">
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
                                        <input type="text" class="form-control" name="first_name"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name:</label>
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_phone_number">US phone number:</label>
                                        <input type="text" class="form-control" name="us_phone_number"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="us_alternate_phone_number">US alternate phone number:</label>
                                        <input type="text" class="form-control" name="us_alternate_phone_number"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="indian_phone">Indian phone:</label>
                                        <input type="text" class="form-control" name="indian_phone"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" name="email"/>
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
                                        <select class="query_status" name="query_status" style="width: 100%">
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
                                        <input type="date" class="form-control" name="name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="query_status">Sources/Referals:</label>
                                        <select class="booking_source" name="booking_source" style="width: 100%">
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
                                        <select class="query_type" name="query_type" style="width: 100%">
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
                                        <select class="booking_type" name="booking_type" style="width: 100%">
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
@endsection

