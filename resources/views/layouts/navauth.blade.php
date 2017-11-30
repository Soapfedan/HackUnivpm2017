 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="img/logo.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">

        <!--<li class="navbar-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>-->
        <li class="navbar-item">&nbsp;&nbsp;&nbsp;</li>
        <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">
      <a class="dropdown-item" href="{{route('dashboard')}}">Catalogo</a>
      <a class="dropdown-item" href="{{route('request')}}">Richieste</a>
      <a class="dropdown-item" href="{{route('shoppingcart')}}">Carrello</a>

    </div>
  </li>
   <li class="navbar-item">
          <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        </li>
    </div>
  </nav>