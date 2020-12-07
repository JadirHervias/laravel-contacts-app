<!DOCTYPE html>
<html>
<head>
<title>Articles</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
<div class="container-fluid m-0">
  @if (Route::has('login'))
      <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
              <a href="{{ url('/articles') }}" class="text-sm text-gray-700 underline">Art&iacute;culos</a>
          @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
              @endif
          @endif
      </div>
  @endif

  @yield('content')
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Desarrollo de Soluciones en la Nube</p>
</div>
</body>
</html>