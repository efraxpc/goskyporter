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
            <a style="margin: 19px;" href="{{ route('bookingsources.create')}}" class="btn btn-primary">New Booking Source</a>
        </div>
        <div class="col-sm-12">
            <hr>
            <h3>Booking sources</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($bookingsources as $bookingsource)
                    <tr>
                        <td>{{$bookingsource->name}}</td>
                        <td>
                            <a href="{{ route('bookingsources.edit',$bookingsource->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('bookingsources.destroy', $bookingsource->id)}}" method="post">
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
