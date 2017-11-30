 <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="{{ route('root') }}"><img src="img/logo.png"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
          <a class="nav-link" href="{{'usage'}}">Come Funziona</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link" href="#">Su di noi</a>
        </li>
        <!--<li class="navbar-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>-->
        <li class="navbar-item">&nbsp;&nbsp;&nbsp;</li>
        <li class="navbar-item">
          <a class="btn btn-outline-info" href="{{ route('register') }}">Diventa uno Shopper</a>
        </li>
    </div>
  </nav>