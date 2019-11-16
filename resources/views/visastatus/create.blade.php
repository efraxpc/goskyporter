@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Add a Visa Status</h3>
            <hr>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('visastatus.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" name="status"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
