@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <i class="far fa-file-excel float-left fa-2x"></i>
                <h4 class="float-left ml-1">Generate Queries Report</h4>
            </div>
        </div>
        <hr>
        <form action="#">
            <div class="row">
                <div class="col-6">
                    <label for="start">From:</label>
                    <input type="date" id="start" name="start">
                </div>
                <div class="col-6">
                    <label for="start">To:</label>
                    <input type="date" id="start" name="start">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <input type="button" class="btn btn-primary" value="Generate">
                </div>
            </div>
        </form>
@endsection
