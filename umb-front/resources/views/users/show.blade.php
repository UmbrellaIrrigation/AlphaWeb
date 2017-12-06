@extends ('layouts.simple')

@section ('content')
    <form method="POST" action="/">
        {{ csrf_field() }}

        <h3 data-edit-user-name>Name</h3>
        
        <hr>

        <div class="form-group">
            <label for="description">Description:</label>
            <p data-edit-user-desc>This is the best description ever.</p>
        </div>
        
        <hr>

        <div class="form-group">
            <label for="permission">Permission:</label>
            <p data-edit-user-auth>3</p>
        </div>
        
        <hr>

    </form>
@endsection