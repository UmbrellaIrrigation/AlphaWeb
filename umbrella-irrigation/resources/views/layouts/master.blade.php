<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include ('components.header')
</head>

<body>
  @yield ('modal')

  @yield ('nav')

  <div class="container-fluid">
    <div class="row">

      @yield ('content')

    </div>
  </div>

  @include ('components.footer')
</body>

</html>