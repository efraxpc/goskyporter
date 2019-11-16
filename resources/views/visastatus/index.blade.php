@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('visastatus.create')}}" class="btn btn-primary">New</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <div class="col-8">
            <hr>
            <h3>Visa Status</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Status</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($visastatus as $visastat)
                    <tr>
                        <td>{{$visastat->status}}</td>
                        <td>
                            <a href="{{ route('visastatus.edit',$visastat->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('visastatus.destroy', $visastat->id)}}" method="post">
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
