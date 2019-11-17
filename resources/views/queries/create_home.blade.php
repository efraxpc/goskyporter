@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card text-white bg-primary mb-3 centerX" style="max-width: 18rem;cursor:pointer">
                    <div class="card-body">
                        <h5 class="card-title">With New Customer</h5>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-white bg-success mb-3 centerX" style="max-width: 18rem;cursor:pointer" >
                    <div class="card-body">
                        <h5 class="card-title">Without Existing Customer</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
