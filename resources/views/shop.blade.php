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
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
				<tr>
					<td>Nome prodotto</td>
					<td>40.00€</td>
				</tr>
			</table>
			<hr>

			<div class="text-right">
				Totale: <span>150€</span>
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