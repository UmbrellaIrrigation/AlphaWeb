<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include ('components.header')
</head>

<body>
  @yield ('modal')

  @yield ('nav')

  <main class="container">

      @yield ('content')

  </main>

  @include ('components.footer')
</body>

</html>