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
            <form method="post" action="{{ route('users.update', $user->id) }}"
                  oninput='password2.setCustomValidity(password2.value != password.value ? "Passwords do not match." : "")'>
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
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="chnagePassword">
                    <label class="form-check-label" for="chnagePassword">Change password</label>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type=password class="form-control" name=password disabled>
                </div>
                <div class="form-group">
                    <label for="password">Confirm password:</label>
                    <input id="password2" class="form-control" type=password name=password2 disabled>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $('#chnagePassword').change(function() {
            if(!this.checked) {
                document.getElementsByName('password')[0].disabled = true;
                document.getElementsByName('password')[0].required = '';

                document.getElementsByName('password2')[0].disabled = true;
                document.getElementsByName('password2')[0].required = '';
            }else{
                document.getElementsByName('password')[0].disabled = false;
                document.getElementsByName('password')[0].required = 'required';

                document.getElementsByName('password2')[0].disabled = false;
                document.getElementsByName('password2')[0].required = 'required';
            }
        });




            document.getElementById('arrival_date').disabled = false;
            document.getElementById('arrival_date').required = 'required';
    </script>
@endsection


