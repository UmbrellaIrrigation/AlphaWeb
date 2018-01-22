@extends ('layouts.master')

@section ('nav')
    @guest
        @include('layouts.nav')
    @else
        @include('components.dashboard.nav')
    @endguest
@endsection

@section ('content')
    <section class="jumbotron jumbotron-fluid text-center">
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
                <h2 class="display-3">Hello {{ Auth::user()->name }}, what would you like to do today?</h2>
                <hr>
                <p class="lead">
                    Please click on any section on the Navigation Menu to get started.
                </p>
            </div>
        @endguest
    </section>
@endsection