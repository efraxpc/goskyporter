@extends('layouts.default')

@section('content')
    @if (Auth::user()->role == 2)
    <div class="row">
        <div class="col-12">
            <a href="{{ route('users.create')}}" class="btn btn-primary">New</a>
        </div>
    </div>
    @endif
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
                            @if ($user->role == 1)
                                Super Admin
                            @elseif ($user->role == 2)
                                Admin
                            @else ($user->role == 3)
                                Agent
                            @endif
                        </td>
                        @if (Auth::user()->id == $user->id || Auth::user()->role == 2 )
                            <td>
                                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                        @endif
                            <td>
                                @if (Auth::user()->role == 2 )
                                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                @endif
                            </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
