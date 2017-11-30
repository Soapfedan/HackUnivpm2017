@extends('layouts.master')
@section('content')

<br><br><br><br>

<main class="catalogs mt-4">
	<div class="container">
		<h4 class="display-4">Catalogo</h4>
		<div class="row">
			@foreach($prods as $prod)
			<?php $names = explode(';',$prod->product);?>
			<div class="col-md-2 py-2">
				<div class="card">
					<img class="card-img-top catalog-image" src=<?= $prod->images?>>
					<div class="card-body">
						<h4 class="card-title"><?= $names[0]?></h4>
						<span><?= $names[1]?></span>
						<p class="card-text"><?= number_format($prod->price, 2, '.', '')?>€</p>
						<a href="#" class="btn btn-success btn-sm"  onclick="event.preventDefault();
						document.getElementById('add-item').submit();">Acquista</a>

						<form id="add-item" action="{{ route('dashboard') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
							<input type="hidden" name="prod_id" value="<?= $prod->id ?>">
						</form>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</main>
@endsection