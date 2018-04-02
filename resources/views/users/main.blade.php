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
    
        @include ('components.user.tree')
    
        <div role="main" class="main-view">
            <iframe src="{{ route('users.index') }}" name="contentFrame" width="100%" height="850"
                scrolling="yes" marginheight="0" marginwidth="0" frameborder="0">
              <p>Your browser does not support iframes</p>
            </iframe>
        </div>
    </div>

@endsection

@section ('footer')
    <script src="{{ URL::asset('js/views/users.js') }}"></script>
@endsection