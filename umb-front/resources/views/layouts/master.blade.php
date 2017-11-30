<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Umbrella Irrigation</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/skin-win8/ui.fancytree.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/jquery.fancytree@2.27/dist/jquery.fancytree-all-deps.min.js"></script>

  <script type="text/javascript">
    $(function () {
      $("#tree").fancytree();
    });
  </script>

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