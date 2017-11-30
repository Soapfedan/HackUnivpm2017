@extends('layouts.master')
@section('content')
<br><br><br><br>
<main class="mt-4">
	<div class="container">

		<h4 class="display-4">Lista della spesa</h4>

		<div class="receipts">
			<small>1 Dicembre 2017 | 11:30</small>
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
			<br><br>
		</div>
	</div>


	<div class="text-center">
		<a href="#" class="btn btn-primary btn-lg">Invia richiesta</a>
	</div>
	<div class="text-center">
		<a href="#" class="btn btn-primary btn-lg">Prenditi carico di questa spesa</a>
	</div>

</main>
@endsection