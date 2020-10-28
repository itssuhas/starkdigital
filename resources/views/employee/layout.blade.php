<!DOCTYPE html>
<html>
<head>
<title>Laravel Application</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<!-- start header Part -->
<div class="jumbotron text-center" style="background-color:lightgreen;">
  <h1><u><b>Laravel Application</b></u></h1>
  <p><i>By: Suhas Salunke</i></p> 
</div>
<!-- End header Part -->

<div class="container">
    @yield('content')
</div>

<!-- start footer Part -->
<div style="background-color:lightgreen; margin-top:20px;" class="jumbotron text-center" style="margin-bottom:0">
  <p>&copy; Copyright 2020</p>
</div>
<!-- End footer Part -->

</body>
</html>