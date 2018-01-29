@extends ('layouts.master')

@section ('nav')
    @guest
        @include('layouts.nav')
    @else
        @include('components.dashboard.nav')
    @endguest
@endsection

@section ('content')
    <!--section class="jumbotron jumbotron-fluid text-center"-->
        @guest
            <div class="container">
                <h2 class="display-2">Welcome to Umbrella Irrigation</h2>
                <hr>
                <p class="lead">
                    To get started using Umbrella Irrigation, please Sign in or Register.
                </p>
                <div class="container col-5">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block btn-lg">Sign in</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-block btn-lg">Register</a>
                </div>
            </div>
        @else
            <div class="container">
                <h2 class="display-3 text-center">Account Settings</h2>
                <hr>
                <p class="lead">
                <form class="form-horizontal" style="width: 50%;" method="POST" action="{{ route('register') }}">
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
                        <label for="password" class="control-label">Old Password</label>
    
                        <div>
                            <input id="password" type="password" class="form-control" name="password" required>
    
                            @if ($errors->has('password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">New Password</label>
    
                        <div>
                            <input id="password" type="password" class="form-control" name="password" required>
    
                            @if ($errors->has('password'))
                                <small class="form-text alert alert-danger" role="alert">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirm New Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Save Settings
                        </button>
                    </div>
                </form>
                </p>
            </div>
        @endguest
    <!--/section-->
@endsection