@extends ('layouts.simple')

@section ('modal')
    @include ('components.delete')
@endsection

@section ('content')
    <form method="" action="">
        <h3 data-editable data-type="text" data-name="name">{{ $valve->name }} </h3>
        
        <hr>

        <div class="form-group">
            <label for="description">Description:</label>
            <p data-editable data-type="text" data-name="description">{{ $valve->description }}</p>
        </div>
        
        <hr>

        <a href="#deleteModal" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-block btn-lg">Delete Valve</a>
    </form>
@endsection