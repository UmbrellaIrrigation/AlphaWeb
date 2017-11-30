@extends ('layouts.master')

@section ('nav')
    @include ('components.nav.users')
@endsection

@section ('content')
    @include ('components.option.users')

    @include ('components.tree.users')

    <main role="main" class="col-md-9 ml-sm-auto pt-3">
        <div class="container">
            @include ('components.form.users')
        </div>
    </main>

@endsection