@extends ('layouts.nav')

@section ('nav-items')
    <li class="nav-item">
        <a class="nav-link" href="#">Overview</a>
    </li>
    @if (Auth::user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('valves') }}">Valves</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('users') }}">Users
                <span class="sr-only">(current)</span>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="#">Forecast</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Retrospective</a>
    </li>
@endsection