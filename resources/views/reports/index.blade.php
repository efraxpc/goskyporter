@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if(session()->get('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <i class="far fa-file-excel float-left fa-2x"></i>
                <h4 class="float-left ml-1">Generate Queries Report</h4>
            </div>
        </div>
        <hr>
        <form action="{{ route('reports.generate.queries') }}" method="get">
            <div class="row">
                <div class="col-6">
                    <label for="from">From:</label>
                    <input type="date" id="start" name="from" required>
                </div>
                <div class="col-6">
                    <label for="to">To:</label>
                    <input type="date" id="start" name="to" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="Generate">
                </div>
            </div>
        </form>
        <div class="row mt-3">
            <div class="col-md-12">
                <i class="far fa-file-excel float-left fa-2x"></i>
                <h4 class="float-left ml-1">Generate Customers Report</h4>
            </div>
        </div>
        <hr>
        <form action="{{ route('reports.generate.customers') }}" method="get">
            <div class="row">
                <div class="col-6">
                    <label for="from">From:</label>
                    <input type="date" id="start" name="from" required>
                </div>
                <div class="col-6">
                    <label for="to">To:</label>
                    <input type="date" id="start" name="to" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="Generate">
                </div>
            </div>
        </form>
@endsection
