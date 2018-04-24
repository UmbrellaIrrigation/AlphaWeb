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
        <fancytree id="tree" route="{{ route('users.tree') }}" type="user-tree"></fancytree>
    </aside>

    <div role="main" class="main-view">

        <div v-if="viewMode === 0" class="jumbotron jumbotron-fluid">
            <div class="container text-center">
                <h1 class="display-3">Please Choose a User</h1>
                <p class="lead">Select a user from the navigation menu.</p>
            </div>
        </div>

        <div v-else-if="viewMode === 1" v-cloak class="container-fluid">
            <h3>@{{ currentUser.name }}</h3>
            <hr>
            <div class="form-group">
                <label for="description">Description:</label>
                <p>@{{ currentUser.description }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="description">Description:</label>
                <p>@{{ currentUser.permission }}</p>
            </div>
            <hr>
            <a href="#deleteModal" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-block btn-lg">Delete User</a>
        </div>

        <div v-else-if="viewMode === 2" v-cloak class="container-fluid">
            <h3>@{{ usergroup.name }}</h3>
            <hr>
            <div class="form-group">
                <label for="parent_id">Parent User Group: <b>@{{ getParentName(usergroup.parent_id) }}</b></label>
            </div>
            <hr>
            <a href="#deleteGroupModal" data-toggle="modal" data-target="#deleteGroupModal" class="btn btn-danger btn-block btn-lg">Delete Group</a>
        </div>

    </div>
</div>
@endsection
 
@section ('footer')
<script src="{{ URL::asset('js/views/users.js') }}"></script>
@endsection