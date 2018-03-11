<!doctype html>
<html lang="en">

<head>
  @include ('components.header')

  <style>
    body {
      padding-top: .5em;
      margin: 0;
    }
  </style>
</head>

<body>
  @yield ('modal')

  <div class="container-fluid">
    @yield ('content')
  </div>

  @include ('components.footer')
</body>

</html>