@extends('layouts.master')
@section('content')
<br><br><br><br>
<br><br><br><br>

<section>
	<?= 'la spesa che devo fare'?>
 @foreach ($orders as $order)
		        
		           @if($id==$order->id_buyer )
		             <li> <?php
		           	
		          //  echo $order->id; 
		          echo $order->id_buyer ;
		            echo $order->id_customer; 
		           echo $order->order_state ;
		            echo $order->products_list; 
		            echo $order->grand_total;
		            ?></li>
@endif @endforeach
</section>
<hr>
<section>
	<?= 'la spesa che devo ricevere'?>
 @foreach ($orders as $order)
		        
		           @if($id==$order->id_customer )
		           <li> <?php
		
		           // echo $order->id; 
		          echo $order->id_buyer ;
		            echo $order->id_customer; 
		           echo $order->order_state ;
		            echo $order->products_list; 
		            echo $order->grand_total;
		            ?></li>
@endif @endforeach
</section>
<hr>
<section>
	<?= 'tutte le richieste'?>
@foreach ($orders as $order)
		        
		           @if($id!=$order->id_customer && $id!=$order->id_buyer )
		            	  <li> <?php
		           	
		           // echo $order->id; 
		          echo $order->id_buyer ;
		            echo $order->id_customer; 
		           echo $order->order_state ;
		            echo $order->products_list; 
		            echo $order->grand_total;
		            ?></li>
@endif @endforeach
</section>
		      
		          

		    
@endsection