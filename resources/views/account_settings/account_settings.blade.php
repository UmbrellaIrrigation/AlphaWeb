@extends ('layouts.master')

@section ('nav')
    @include('components.nav')
@endsection

@section ('content')
<!--script>
var url = "/account/" + ({{ Auth::user()->id }}).toString() + "/getsettings";
</script-->
            <div class="container" scrolling="yes" style="width: 50%;">
                <div id="settings"></div>
            </div>
@endsection

@section ('footer')
<script src="{{ asset('js/views/account_settings.js') }}"></script>
@endsection