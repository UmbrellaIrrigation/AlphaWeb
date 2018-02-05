@extends ('layouts.simple')

@section ('content')
    <form method="" action="">
        <h3 data-editable data-type="text" data-name="name">{{ $user->name }}</h3>

        <hr>

        <div class="form-group">
            <label for="description">Description</label>
            <p data-editable data-type="text" data-name="description">{{ $user->description }}</p>
        </div>

        <hr>

        <div class="form-group">
            <label for="permission">Permission</label>
            <p data-editable data-type="number" data-name="permission">{{ $user->permission }}</p>
        </div>
        <div class="container col-5">
            <a href="/users/delete/{{$user->id}}" class="btn btn-primary btn-block btn-lg">Delete</a>
        </div>
        <hr>

    </form>
@endsection
