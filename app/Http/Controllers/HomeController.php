<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
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


    public function shop()
    {
        $products = [];
        $status = 'empty';
        $pendantOrder =  Order::extractPendantOrder();
        if($pendantOrder->isEmpty()){
            return view('shop',['status'=>$status,'products'=>$products]);
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

            return view('shop',['status'=>$status,'products'=>$products,'date'=>$pendantOrder[0]->updated_at,'grand_total'=>$pendantOrder[0]->grand_total]);
        }
    }

    public function request()
    {
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
                }
            }
        }

        return view('request',['todo'=>$todo,'toreceive'=>$toreceive,'all'=>$all]);
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
            Order::create(['products_list'=>$prod_id,'order_state'=>'pendant','id_buyer'=>Auth::user()->id,'grand_total'=>$product->price]);
        }

        
        $prods = Product::extractProds();

        return view('dashboard',['prods'=>$prods]);
        
        
    }

    public function bio(){
        $user = User::find(Auth::user()->id);
        return view('bio',['user'=>$user]);
    }

    public function bioRequest(){
        $user = User::find(request()->id);
        return view('bio',['user'=>$user]);
    }

    public function getRequest(){
        $products = [];
        $auth_id = Auth::user()->id;
        $currentOrder = Order::find(request()->id);
        $status = 'ok';
            $prods = explode(';', $currentOrder->products_list); 
            $occurency=array_count_values($prods);
            foreach ($occurency as $key => $value) {
               $elem = Product::find($key);
               $products[] = [$elem->product,$elem->price,$value];
            }
            $buyer = User::find($currentOrder->id_buyer);
            $customer = User::find($currentOrder->id_customer);
            return view('shop',['status'=>$status,'products'=>$products,'apt_date'=>$currentOrder->updated_at,'grand_total'=>$currentOrder->grand_total,'order_state'=>$currentOrder->order_state,'auth_id'=>$auth_id,'buyer'=>$buyer,'customer'=>$customer]);
        
    }


}
