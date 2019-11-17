@extends('layouts.default')

@section('content')
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
            <h3>Queries</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($querystatuses as $querystatus)
                    <tr>
                        <td>{{$querystatus->name}}</td>
                        <td>
                            <a href="{{ route('querystatuses.edit',$querystatus->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('querystatuses.destroy', $querystatus->id)}}" method="post">
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
            </div>
    </div>
@endsection
