@extends ('layouts.master')

@section ('modal')

    @include ('components.user.create')
    @include ('components.user.group.create')

@endsection

@section ('nav')
    @include ('components.user.nav')
@endsection

@section ('content')

    <div class="row">
        @include ('components.user.options')
    
        @include ('components.user.tree')
    
        <main role="main" class="col-md-9 ml-sm-auto pt-3">
            <iframe src="/users/index" name="contentFrame" width="100%" height="850"
                scrolling="yes" hspace="0"
                vspace="0" marginheight="0" marginwidth="0" frameborder="0">
              <p>Your browser does not support iframes</p>
            </iframe>
        </main>
    </div>

@endsection