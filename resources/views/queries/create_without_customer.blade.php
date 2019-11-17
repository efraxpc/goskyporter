@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Create Query without customer</h3>
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
                <form method="post" action="{{ route('querystatuses.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h3>Customer data</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="first_name">Frist name:</label>
                                        <input type="text" class="form-control" name="first_name"/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_name">Last name:</label>
                                        <input type="text" class="form-control" name="name"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
