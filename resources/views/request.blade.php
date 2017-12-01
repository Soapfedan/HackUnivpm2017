@extends('layouts.master')
@section('content')
<br><br><br><br>
<br><br><br><br>

<section>
	la spesa che devo andare a comprare io 
	<?php print_r($todo) ?>
</section>
<hr>
<section>
	tutte le richieste che ho fatto per ricevere la spesa
	<?php print_r($toreceive) ?>
</section>
<hr>
<section>
	tutte le altre richieste
	<?php print_r($all) ?>
</section>
		      
		          

		    
@endsection