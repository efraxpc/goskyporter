@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <hr>
            <h3>Add a New User</h3>
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
                <form method="post" action="{{ route('users.store') }}"
                      oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type=password class="form-control" required name=password>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm password:</label>
                        <input id="password2" class="form-control" required type=password name=password2>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="3">Agent</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
