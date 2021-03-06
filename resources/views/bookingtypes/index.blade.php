@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('bookingtypes.create')}}" class="btn btn-primary">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <div class="col-12">
            <hr>
            <h3>Booking Types</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($bookingtypes as $bookingtype)
                    <tr>
                        <td>{{$bookingtype->name}}</td>
                        <td>
                            <a href="{{ route('bookingtypes.edit',$bookingtype->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('bookingtypes.destroy', $bookingtype->id)}}" method="post">
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
