@extends('layouts.master')
@section('content')
<br><br><br><br>
<br><br>
<section class="container">

	<div class="text-right legends">
		Legenda:
		<span class="border-completed">Spesa effettuata e consegnata</span>
		<span class="border-requested">Richiesta in corso</span>
		<span class="border-accepted">Richiesta presa in carico</span>
	</div>

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

<br><br>
<div class="container">
	<h3>Mappa delle richieste</h3>
</div>
<div id="map" style="width: 100%;min-height: 300px;"></div>
	          
<script>
	var addresses = new Array();


	@for($i = 0;$i<count($names);$i++)
		<?php echo "addresses[".$i."] = new Array();";
		 echo "addresses[".$i."][0]='".$names[$i]."';";
		echo "addresses[".$i."][1]='".$addresses[$i]."';";
		echo "addresses[".$i."][2]='".$bills[$i]."';";
		?>
	@endfor

console.log(addresses);

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0hol98vPj-K8WPcyLn086HQjTSfGIQ_4&callback=initMap"></script>
<script src="{{asset('js/maps.js')}}"></script>
		    
@endsection