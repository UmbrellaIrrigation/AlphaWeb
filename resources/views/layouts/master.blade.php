<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include ('components.header')
</head>

<body>

  <div id="app">
    @yield ('modal')
  
    @yield ('nav')
  
    <main class="container-fluid">
  
        @yield ('content')
  
    </main>
  </div>

  @include ('components.footer')

  @yield ('footer')
</body>

</html>