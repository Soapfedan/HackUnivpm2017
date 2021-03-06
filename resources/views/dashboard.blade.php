@extends('layouts.master')
@section('content')

<br><br><br><br>

<main class="catalogs mt-4">
	<div class="container">
		<h4 class="display-4">Catalogo</h4>
				<form action="{{ route('search') }}" method="POST">
					{{ csrf_field() }}
		      <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" required>
		      <input type="submit" value="Ricerca" class="btn btn-outline-primary">
		    </form>
		<div class="row">
			@foreach($prods as $prod)
			<?php $names = explode(';',$prod->product);
			$out = strlen($names[1]) > 65 ? substr($names[1],0,65)."..." : $names[1];?>
			<div class="col-md-2 py-2">
				<div class="card">
					<img class="card-img-top catalog-image" src=<?= $prod->images?>>
					<div class="card-body">
						<h4 class="card-title"><?= $names[0]?></h4>
						<span><?= $out?></span>
						<p class="card-text"><?= number_format($prod->price, 2, '.', '')?>€</p>

						<form id="add-item" action="{{ route('dashboard') }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="prod_id" value="<?= $prod->id ?>">
							<input type="submit" value="Acquista" class="btn btn-success btn-sm acquista">
						</form>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</main>
@endsection