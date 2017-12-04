<!doctype html>
<html lang="en">

<head>
  @include ('components.header')
</head>

<body>
  @yield ('nav')

  <div class="container-fluid">
    <div class="row">

      @yield ('content')

    </div>
  </div>

  @include ('components.footer')
</body>

</html>