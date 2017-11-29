@extends ('layouts.master')

@section ('nav')
    @include ('components.nav.users')
@endsection

@section ('content')
    @include ('components.option.users')

    @include ('components.tree.users')

    <main role="main" class="col-md-9 ml-sm-auto pt-3">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Please Choose a User</h1>
                <p class="lead">Select a user from the navigation menu.</p>
            </div>
        </div>
    </main>

@endsection