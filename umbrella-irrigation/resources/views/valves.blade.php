@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            Ungrouped Valves
            @foreach($valves as $valve)
                {{$valve}}
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
