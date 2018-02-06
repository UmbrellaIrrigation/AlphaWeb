@extends ('layouts.master')

@section ('modal')
    @include ('components.valve.create')
    @include ('components.valve.group.create')
@endsection

@section ('nav')
    @include ('components.nav')
@endsection

@section ('content')
    @include ('components.options')

    @include ('components.valve.tree')

    <main role="main" class="main-view">
        <iframe src="{{ route('valves.index') }}" name="contentFrame" width="100%" height="850"
            scrolling="yes" hspace="0"
            vspace="0" marginheight="0" marginwidth="0" frameborder="0">
          <p>Your browser does not support iframes</p>
        </iframe>
    </main>

@endsection