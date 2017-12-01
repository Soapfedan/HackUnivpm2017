<!DOCTYPE html>
<html lang="en">
<head>
  <title>LetMeBuy - lasciati fare la spesa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/slideshow.css')}}">
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}">

</head>
<body>
  <!-- MENU -->
  <div class="line-header"></div>
@guest
 @include('layouts.nav')
 @else
 @include('layouts.navauth')
@endguest
@yield('content')
@include('layouts.footer')

  <!-- Optional JavaScript -->
  <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
 
</body>
</html>