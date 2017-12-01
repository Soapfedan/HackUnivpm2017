@extends('layouts.master')
@section('content')
<br><br><br><br>
<main class="mt-4">
	<div class="container">

		<h4 class="display-4">Lista della spesa</h4>

		<div class="receipts">
			@if($status=='ok')
			<?php print_r($apt_date)?>
			<small>{{ Carbon\Carbon::parse($apt_date)->format('d-m-Y | G:i:s') }}</small>
			<hr>
			<table>
				@foreach($products as $product)
				<?php $names = explode(';',$product[0]);?>
				<tr>
					<td><?php echo $names[0].' - '.$names[1].' (x'.$product[2].')';?></td>
					<td><?= number_format($product[1]*$product[2],2,'.','')?>€</td>
				</tr>
				@endforeach
			</table>
			<hr>

			<div class="text-right">
				Totale: <span><?= number_format($grand_total,2,'.','')?>€</span>
			</div>
			@else
			<p>La tua lista della spesa è vuota!</p>
			@endif
			<br><br>
		</div>
	</div>

	@if($order_state=='completed')
		@if($auth_id==$buyer->id)
			<div class="text-center">
				Consegnato a: 
				<a href="{{route('bioRequest', ['id' => $customer->id])}}" class="btn btn-primary btn-lg"><?= $buyer->name.' '.$buyer->surname?></a>
			</div>
		@else
			<div class="text-center">
				Preso in carico e consegnato da: 
				<a href="{{route('bioRequest', ['id' => $buyer->id])}}" class="btn btn-primary btn-lg"><?= $buyer->name.' '.$buyer->surname?></a>
			</div>
		@endif
	@elseif($order_state=='accepted')
		@if($auth_id==$buyer->id)
			<div class="text-center">
				Da consegnare entro le {{Carbon\Carbon::parse($apt_date)->format('d-m-Y | G:i:s')}} a : 
				<a href="{{route('bioRequest', ['id' => $customer->id])}}" class="btn btn-primary btn-lg"><?= $buyer->name.' '.$buyer->surname?></a>
			</div>
		@else
			<div class="text-center">
				Preso in carico e in consegna da: 
				<a href="{{route('bioRequest', ['id' => $buyer->id])}}" class="btn btn-primary btn-lg"><?= $buyer->name.' '.$buyer->surname?></a>
			</div>
			<div class="text-center">
				<div class="text-center">
				Concludi la trattativa e dai una valutazione
				<a href="#" class="btn btn-primary btn-lg">Valuta</a>
			</div>
			
			</div>
		@endif
	@else
		@if($auth_id==$customer->id)
			<div class="text-center">
				<a href="{{route('deleterequest',['id'=>$current_order_id])}}" class="btn btn-primary btn-lg">Cancella questo ordine</a>
			</div>
			Ecco gli utenti che hanno richiesto di prendere a carico la tua lista della spesa
			<ul class="list-group">
				@foreach($users as $user)
			  <li class="list-group-item">
			  	<?=$user->name.' '.$user->surname?>
			    <a href="{{route('bioRequest', ['id' => $user->id])}}" class="btn btn-primary btn-lg">Visita profilo</a>
			    <a href="#" class="btn btn-success btn-lg">Accetta</a>
			  </li>
			 @endforeach
			</ul>
		@else
			<div class="text-center">
				<a href="{{route('dorequest', ['id' => $auth_id])}}" class="btn btn-primary btn-lg">Fai richiesta per questo ordine</a>
			</div>
		@endif
	@endif

</main>
@endsection