@extends ('layouts.master')

@section ('modal')
    @include ('components.create')
    @include ('components.delete')
@endsection

@section ('nav')
    @include ('components.nav')
@endsection

@section ('content')

    <div class="row">
        @include ('components.options')
    
        <aside class="tree-nav">
            <h4 class="pl-3">Navigation Menu</h4>
            <hr>
            <fancytree id="tree" route="{{ route('users.tree') }}" refresh="refresh-user-tree"></fancytree>
        </aside>
    
        <div role="main" class="main-view">
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-center">
                    <h1 class="display-3">Please Choose a User</h1>
                    <p class="lead">Select a user from the navigation menu.</p>
                </div>
            </div>
            <div>
                <h3>@{{ user.name }}</h3>
                <hr>
                <p>@{{ user.description }}</p>
                <hr>
                <p>@{{ user.permission }}</p>
                <hr>
                <a href="#deleteModal" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-block btn-lg">Delete User</a>
            </div>
        </div>
    </div>

@endsection

@section ('footer')
    <script src="{{ URL::asset('js/views/users.js') }}"></script>
@endsection