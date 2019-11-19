@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('users.create')}}" class="btn btn-primary">New</a>
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
            <h3>Users</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->role === 2)
                                Admin
                            @elseif ($user->role === 3)
                                Agent
                            @else
                                Super Admin
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
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
