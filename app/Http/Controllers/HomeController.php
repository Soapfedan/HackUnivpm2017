<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use App\Product;
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

            return view('shop',['status'=>$status,'products'=>$products,'grand_total'=>$pendantOrder[0]->grand_total]);
        }
    }

    public function request()
    {

        $orders = Order::all();


        return view('request',['orders'=>$orders,'id'=>Auth::user()->id]);
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


}
