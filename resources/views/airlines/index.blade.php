@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div>
            <a style="margin: 19px;" href="{{ route('airlines.create')}}" class="btn btn-primary">New Airline</a>
        </div>
        <div class="col-sm-12">
            <h1 class="display-3">Airlines</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($airlines as $airline)
                    <tr>
                        <td>{{$airline->name}}</td>
                        <td>
                            <a href="{{ route('airlines.edit',$airline->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('airlines.destroy', $airline->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection