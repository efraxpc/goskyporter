@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('querytypes.create')}}" class="btn btn-primary">New</a>
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
            <h3>Query Types</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($querytypes as $querytype)
                    <tr>
                        <td>{{$querytype->name}}</td>
                        <td>
                            <a href="{{ route('querytypes.edit',$querytype->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('querytypes.destroy', $querytype->id)}}" method="post">
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
