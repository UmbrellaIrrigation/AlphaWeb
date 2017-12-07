@extends('layouts.master')

@section ('nav')
    @include ('layouts.nav')
@endsection

@section('content')
    <div class="row mt-5 mb-4">
        <p class="col display-4 text-center">Thanks for choosing Umbrella Irrigation!</p>
    </div>

    <div class="card row">

        <div class="card-header text-center">Please enter your information so we can get you up and running</div>

        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>

                    <div>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Description</label>

                    <div>
                        <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required></textarea>
                        
                        @if ($errors->has('description'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>

                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>

                    <div>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
