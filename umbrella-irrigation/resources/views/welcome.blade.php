@extends ('layouts.master')

@section ('nav')
    @include('components.nav')
@endsection

@section ('content')
    <section class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h2 class="display-2">Welcome to Umbrella Irrigation</h2>
            <hr>
            <p class="lead text-muted">
                To get started using Umbrella Irrigation, please login or register.
            </p>
            <div class="container col-5">
                <a href="{{ route('login') }}" class="btn btn-primary btn-block btn-lg">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-block btn-lg">Register</a>
            </div>
        </div>
    </section>
@endsection