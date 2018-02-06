@extends('layouts.master')

@section ('nav')
    @include ('layouts.nav')
@endsection
@if(session('status'))
    <div class = "alert alert-success">
        {{session('status')}}
    </div>
@endif
@if(session('warning'))
    <div class = "alert alert-warning">
        {{session('warning')}}
    </div>
@endif
@section('content')
    <div class="row mt-5 mb-4">
        <p class="col display-4 text-center">Welcome back, Sign in to get back to business.</p>
    </div>

    <div class="container">

        <div class="card row">

            <div class="card-header text-center">Please enter your information so we can verify your credentials</div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Sign in
                        </button>

                        <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
@endsection
