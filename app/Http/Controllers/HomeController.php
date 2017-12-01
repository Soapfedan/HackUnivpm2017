<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\Userrequest;
use App\Review;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prods = Product::extractProds();

        return view('dashboard',['prods'=>$prods]);
    }

      public function search()
    {
        $text = request()->search;
        $prods = Product::search($text);
       
        return view('dashboard',['prods'=>$prods]);
    }


    public function shop()
    {
        $products = [];
        $status = 'empty';
        $pendantOrder =  Order::extractPendantOrder();
        if($pendantOrder->isEmpty()){
            return view('shop',['status'=>$status,'products'=>$products,'get_status'=>false,'current_order_id'=>0]);
        }else{
            $status = 'ok';
            $prods = explode(';', $pendantOrder[0]->products_list); 
            $occurency=array_count_values($prods);
            foreach ($occurency as $key => $value) {
               $elem = Product::find($key);
               $products[] = [$elem->product,$elem->price,$value];
            }
            //print_r($pendantOrder[0]->updated_at)
            //$date = date('d-m-Y',$pendantOrder[0]->updated_at);
            //$time = date('Gi:s',$pendantOrder[0]->updated_at);

            return view('shop',['status'=>$status,'products'=>$products,'apt_date'=>$pendantOrder[0]->updated_at,'grand_total'=>$pendantOrder[0]->grand_total,'get_status'=>false,'current_order_id'=>$pendantOrder[0]->id]);
        }
    }

    public function request()
    {
        $adresses = [];
        $names = [];
        $bills = [];
        $todo = [];
        $toreceive = [];
        $all = [];
        $id_user = Auth::user()->id;
        $orders = Order::all();
        foreach ($orders as $order) {
           $prods_id = explode(';', $order->products_list);
           $prods_name = [];
           $i = 0;
           foreach ($prods_id as $prod_id) {
              $i++;
              if($i<3){
                $prod = Product::find($prod_id);
                $prods_name[] = str_replace(';', '-',$prod->product);
              }  
           }
          if($order->order_state!='pendant'){
                 if($order->id_buyer==$id_user){
                    //numero ordine, stato ordine (che non sia pendant), il totale dell'ordine e il nome di tutti i prodotti
                    $todo[] = [$order->id,$order->order_state,$order->grand_total,$prods_name];
                }
                 if($order->id_customer==$id_user){
                    //numero ordine, stato ordine (che non sia pendant), il totale dell'ordine e il nome di tutti i prodotti
                    $toreceive[] = [$order->id,$order->order_state,$order->grand_total,$prods_name];
                }
                 if($order->id_buyer!=$id_user && $order->id_customer!=$id_user && $order->order_state=='requested'){
                    //numero ordine, stato ordine (che non sia pendant), il totale dell'ordine e il nome di tutti i prodotti
                    $all[] = [$order->id,$order->order_state,$order->grand_total,$prods_name];
                    $customer = User::find($order->id_customer);
                    //Nome e Cognome
                    $names[] = $customer->name.' '.$customer->surname;
                    //indirizzo
                    $adresses[] = $customer->address.', '.$customer->civic_number.' - '.$customer->country;
                    //Totali
                    $bills[] = $order->grand_total;
                }
            }
        }

        return view('request',['todo'=>$todo,'toreceive'=>$toreceive,'all'=>$all,'addresses'=>$adresses,'names'=>$names,'bills'=>$bills]);
    }
    public function addItem()
    {
        //numero prodotto
        $prod_id = request()->prod_id;
        $product = Product::find($prod_id);
        //vediamo se c'è una richiesta pendente
        $order = Order::extractOrder();
        if(!$order->isEmpty()){
            //UPDATE
            $pendantOrder =  Order::extractPendantOrder();
            Order::updatePendantOrder($pendantOrder,$prod_id,$product->price);
        }else{
            //INSERT
            Order::create(['products_list'=>$prod_id,'order_state'=>'pendant','id_customer'=>Auth::user()->id,'grand_total'=>$product->price]);
        }

        
        $prods = Product::extractProds();

        return view('dashboard',['prods'=>$prods]);
        
        
    }

    public function bio(){
        $user = User::find(Auth::user()->id);
        $rating = Review::getRating( Auth::user()->id);
        return view('bio',['user'=>$user, 'rating' => $rating]);
    }

    public function bioRequest(){
        $user = User::find(request()->id);
         $rating = Review::getRating( $user->id);
        return view('bio',['user'=>$user,'rating'=>$rating]);
    }

    public function deleteRequest(){
        $id = request()->id;
        Order::deleteOrder($id);
        return redirect()->route('request');

        
    }

    public function getRequest(){
        $products = [];
        $auth_id = Auth::user()->id;
        $currentOrder = Order::find(request()->id);
        $status = 'ok';
        $requests = Userrequest::extractRequests($currentOrder->id);
        $users = [];

        foreach ($requests as $request) {
           $users[] = User::find($request->id_buyer);
        }
            $prods = explode(';', $currentOrder->products_list); 
            $occurency=array_count_values($prods);
            foreach ($occurency as $key => $value) {
               $elem = Product::find($key);
               $products[] = [$elem->product,$elem->price,$value];
            }
            $buyer = User::find($currentOrder->id_buyer);
            $customer = User::find($currentOrder->id_customer);
            return view('shop',['status'=>$status,'current_order_id'=>$currentOrder->id,'products'=>$products,'apt_date'=>$currentOrder->updated_at,'grand_total'=>$currentOrder->grand_total,'order_state'=>$currentOrder->order_state,'auth_id'=>$auth_id,'buyer'=>$buyer,'customer'=>$customer,'users'=>$users,'get_status'=>true]);
        
    }
        public function doRequest(){
        $id_buyer = request()->id;
        $current_order_id = request()->current_order_id;
        Userrequest::createRequest($current_order_id,$id_buyer);
        return redirect()->route('request');

        
    }

    public function acceptOrder(){
        $id_ord = request()->id_ord;
        $id_buyer = request()->id_buyer;
        Userrequest::deleteAllRequests($id_ord);
        Order::acceptOrder($id_ord,$id_buyer);
        return redirect()->route('request');

    }
    
    public function valuta(){
        $id_user = request()->id_user;
        $rating = request()->rating;
        $id_ord = request()->id_ord;
        Review::reviewUser($id_user,$rating);
        Order::completeOrder($id_ord);
        return redirect()->route('request');
        
    }

    public function clean(){
        $id=request()->id;
        Order::clean($id);
        return redirect()->route('shoppingcart');
    }

    public function confirm(){
        $id=request()->id;
        Order::confirm($id);
        return redirect()->route('request');
    }


}
