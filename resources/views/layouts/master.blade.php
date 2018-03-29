<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include ('components.header')
</head>

<body>
  @yield ('modal')

  @yield ('nav')

  <main class="container-fluid">

      @yield ('content')

  </main>

  @include ('components.footer')
  
  @yield ('footer')
</body>

</html>