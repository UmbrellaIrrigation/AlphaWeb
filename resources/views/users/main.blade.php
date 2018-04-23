@extends ('layouts.master')

@section ('modal')
    @include ('components.create')
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
        </div>
    </div>

@endsection

@section ('footer')
    <script src="{{ URL::asset('js/views/users.js') }}"></script>
@endsection