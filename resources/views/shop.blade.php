@extends('layouts.master')
@section('content')
<br><br><br><br>
<main class="mt-4">
	<div class="container">

		<h4 class="display-4">Lista della spesa</h4>

		<div class="receipts">
			@if($status=='ok')
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
				Totale: <span><?= number_format($grand_total,2,'.','') + 3.99?>€</span><br>
				<small style="text-align: right; font-size: 13px;">[di cui 3.99€ di commissione]</small><br>
			</div>
			@else
			<p>La tua lista della spesa è vuota!</p>
			@endif
			<br><br>
		</div>
	</div>
	@if($get_status==true)
		@if($order_state=='completed')
			@if($auth_id==$buyer->id)
				<div class="text-center">
					Consegnato a: 
					<a href="{{route('bioRequest', ['id' => $buyer->id])}}" class="btn btn-primary btn-lg"><?= $customer->name.' '.$customer->surname?></a>
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
					<a href="{{route('bioRequest', ['id' => $customer->id])}}" class="btn btn-primary btn-lg"><?= $customer->name.' '.$customer->surname?></a>
				</div>
			@else
				<div class="text-center">
					Preso in carico e in consegna da: 
					<a href="{{route('bioRequest', ['id' => $buyer->id])}}" class="btn btn-primary btn-lg"><?= $buyer->name.' '.$buyer->surname?></a>
				</div>
				<br>
				<div class="text-center">
					<div class="text-center">
					Concludi la trattativa e dai una valutazione:<br>
					<form  method="POST" action="{{ route('valuta',['id_ord'=> $current_order_id]) }}">
                        {{ csrf_field() }}
						<label class="radio-inline"><input type="radio" name="rating" value="1"> 1 </label>
						<label class="radio-inline"><input type="radio" name="rating" value="2"> 2 </label>
						<label class="radio-inline"><input type="radio" name="rating" value="3"> 3 </label>
						<label class="radio-inline"><input type="radio" name="rating" value="4"> 4 </label>
						<label class="radio-inline"><input type="radio" name="rating" value="5"> 5 </label>
						<input type="hidden" value="{{$buyer->id}}" name="id_user">
						<br>
						<input type="submit" value="Valuta" class="btn btn-primary btn-lg">
					</form>
				</div>
				
				</div>
			@endif
		@else
			@if($auth_id==$customer->id)
				<div class="text-center">
					<a href="{{route('deleterequest',['id'=>$current_order_id])}}" class="btn btn-primary btn-lg">Cancella questo ordine</a>
				</div>
				<div class="text-center">
					<div class="text-center">
						<hr>
				Ecco gli utenti che hanno richiesto di prendere a carico la tua lista della spesa
				<ul class="list-group">
					@foreach($users as $user)
				  <li class="list-group-item">
				  	<?=$user->name.' '.$user->surname?>
				    <a href="{{route('bioRequest', ['id' => $user->id])}}" class="btn btn-primary btn-lg">Visita profilo</a>
				   
				    <form  method="POST" action="{{ route('acceptorder') }}">
                        {{ csrf_field() }}
						<input type="hidden" value="{{$current_order_id}}" name="id_ord">
						<br>
						<input type="hidden" value="{{$user->id}}" name="id_buyer">
						<br>
						<input type="submit" value="Accetta" class="btn btn-primary btn-lg">
					</form>
				  </li>
				 @endforeach
				</ul>
				</div>
			</div>
			@else
				<div class="text-center">
					<a href="{{route('dorequest', ['id' => $auth_id,'current_order_id'=>$current_order_id])}}" class="btn btn-primary btn-lg">Fai richiesta per questo ordine</a>
				</div>
			@endif
		@endif
	
			
	@else
		<div class="text-center">
					<a href="{{route('clean', ['id' => $current_order_id])}}" class="btn btn-primary btn-lg">Svuota il carrello</a>
					<a href="{{route('confirm', ['id' => $current_order_id])}}" class="btn btn-primary btn-lg">Conferma carrello</a>
				</div>
	@endif
</main>
@endsection