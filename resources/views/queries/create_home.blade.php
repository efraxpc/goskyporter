@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('query_create_without_customer') }}">
                    <div class="card text-white bg-primary mb-3 centerX" style="max-width: 18rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 d-block d-sm-none d-md-block">
                                    <i class="fas fa-user-tie fa-4x "></i>
                                </div>
                                <div class="col-9">
                                   <h4 class="card-title"> <b>ADD NEW CUSTOMER</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('query_create_with_customer') }}">
                    <div class="card text-white bg-success mb-3 centerX" style="max-width: 18rem;" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 d-block d-sm-none d-md-block">
                                    <i class="fas fa-user-tie fa-4x  "></i>
                                </div>
                                <div class="col-9">
                                    <h4 class="card-title"> <b>VIEW EXISTING CUSTOMER</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
