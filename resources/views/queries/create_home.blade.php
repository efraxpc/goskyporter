@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('customer_create_with_customer') }}">
                    <div class="card text-white bg-primary mb-3 centerX" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Without Customer</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('customer_create_without_customer') }}">
                    <div class="card text-white bg-success mb-3 centerX" style="max-width: 18rem;" >
                        <div class="card-body">
                            <h5 class="card-title">With Customer</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
