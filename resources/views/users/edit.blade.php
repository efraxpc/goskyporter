@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Update a User</h3>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" value="{{ $user->role }}">
                        <option value="3"  @if ($user->role == 3) selected @endif >Agent</option>
                        <option value="2"  @if ($user->role == 2) selected @endif >Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection