@extends('layouts.master')
@section('content')
<br><br><br><br>
<br><br>

<section class="container">

	<h3>Richieste prese in carico da te</h3>
	<div class="row">
	@foreach($todo as $to)
			<div class="col-md-3">
				<div class="card border-{{$to[1]}}">
				  <div class="card-body">
				    <blockquote class="card-blockquote">
				      <p><strong>Lista della spesa #{{$to[0]}}</strong></p>
				      <ul>
						@foreach($to[3] as $prod)
				      	<li>{{$prod}}</li>
				      	@endforeach
				      	<li>...</li>
				      </ul>
				      <footer class="text-left"><h4><span class="badge badge-success">{{$to[2]}}€</span></h4></footer>
				      <footer class="text-right"><a href="{{route('getRequest', ['id' => $to[0]])}}" class="btn btn-primary btn-sm">Vedi tutto</a></footer>
				    </blockquote>
				  </div>
				</div>
			</div>
	@endforeach
	</div>

</section>
<br><br>
<section class="container">

	<h3>Le mie richieste</h3>
	<div class="row">
	@foreach($toreceive as $torec)
			<div class="col-md-3">
				<div class="card border-{{$torec[1]}}">
				  <div class="card-body">
				    <blockquote class="card-blockquote">
				      <p><strong>Lista della spesa #{{$torec[0]}}</strong></p>
				      <ul>
						@foreach($torec[3] as $prod)
				      	<li>{{$prod}}</li>
				      	@endforeach
				      	<li>...</li>
				      </ul>
				      <footer class="text-left"><h4><span class="badge badge-success">{{$torec[2]}}€</span></h4></footer>
				      <footer class="text-right"><a href="{{route('getRequest', ['id' => $torec[0]])}}" class="btn btn-primary btn-sm">Vedi tutto</a></footer>
				    </blockquote>
				  </div>
				</div>
			</div>
	@endforeach
	</div>

</section>
<br><br>
<section class="container">

	<h3>Tutte le richieste</h3>
	<div class="row">
	@foreach($all as $alls)
			<div class="col-md-3">
				<div class="card border-{{$alls[1]}}">
				  <div class="card-body">
				    <blockquote class="card-blockquote">
				      <p><strong>Lista della spesa #{{$alls[0]}}</strong></p>
				      <ul>
						@foreach($alls[3] as $prod)
				      	<li>{{$prod}}</li>
				      	@endforeach
				      	<li>...</li>
				      </ul>
				      <footer class="text-left"><h4><span class="badge badge-success">{{$alls[2]}}€</span></h4></footer>
				      <footer class="text-right"><a href="{{route('getRequest', ['id' => $alls[0]])}}" class="btn btn-primary btn-sm">Vedi tutto</a></footer>
				    </blockquote>
				  </div>
				</div>
			</div>
	@endforeach
	</div>

</section>
		          

		    
@endsection