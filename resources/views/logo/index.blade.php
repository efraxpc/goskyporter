@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Logo</h3>
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
                @if(!empty($success))
                    <div class="alert alert-success"> {{ $success }}</div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <img src="{{ $path }}" class="img-fluid rounded mx-auto d-block w-25 p-3"  alt="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <form method="post" action="{{ route('logo.save') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idLogo" value="{{$logo->id}}">
                            <div class="form-group">
                                <input type="file" class="form-control" name="logo" accept="image/png, image/jpeg" required/>
                            </div>
                            <button type="submit" class="btn btn-primary">update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
