@extends('layouts.master') 

@section ('nav') 
    @include ('components.nav') 
@endsection 

@section('content')
    <div class="row mt-5 mb-4">
        <p class="col display-4 text-center">Forgot your password? Don't worry, we've got you covered.</p>
    </div>

    <div class="container">
        <div class="card row">
    
            <div class="card-header text-center">Enter your email so we can send you password reset instructions</div>
    
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
    
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>
    
                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                            <small class="form-text alert alert-danger" role="alert">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                    </div>
    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>
@endsection