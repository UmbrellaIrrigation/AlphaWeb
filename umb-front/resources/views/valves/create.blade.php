@extends ('layouts.master')

@section ('nav')
    @include ('components.nav.users')
@endsection

@section ('content')
    @include ('components.option.valves')

    @include ('components.tree.valves')

    <main role="main" class="col-md-9 ml-sm-auto pt-3">
        <div class="container">
            @include ('components.form.valves')
        </div>
    </main>

@endsection