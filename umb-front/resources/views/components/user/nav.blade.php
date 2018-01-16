@extends ('components.nav')

@section ('nav-items')
    <li class="nav-item">
        <a class="nav-link" href="#">Overview</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/valves">Valves</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/users">Users
            <span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Forecast</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Retrospective</a>
    </li>
@endsection