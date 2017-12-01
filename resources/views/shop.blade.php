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
				Dai una valutazione
				<a href="#" class="btn btn-primary btn-lg">Valuta</a>
			</div>
			
			</div>
		@endif
	@else

	@endif

</main>
@endsection