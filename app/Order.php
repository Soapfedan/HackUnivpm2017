<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_buyer', 'id_customer','order_state','products_list','grand_total','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public static function extractOrder(){

       $order = Order::where([['id_customer','=', Auth::user()->id],
        ['order_state','=','pendant']])->get();
       return $order;
   }
   public static function extractPendantOrder(){

     return Order::where([['order_state','pendant'],['id_customer',Auth::user()->id]])->get();
      
   }

   public static function updatePendantOrder($pendantOrder,$prod_id,$price){

            Order::where('id',$pendantOrder[0]->id)->update(['products_list' => $pendantOrder[0]->products_list.';'.$prod_id,
                'grand_total'=>$pendantOrder[0]->grand_total+$price]);
   }
   public static function deleteOrder($id){

          Order::where('id',$id)->delete();
           
   }

   public static function completeOrder($id){
              Order::where('id',$id)->update(['order_state' => 'completed']);
   }

   public static function acceptOrder($id_ord,$id_buyer){
         Order::where('id',$id_ord)->update(['order_state'=>'accepted','id_buyer'=>$id_buyer]);
   }

    public static function clean($id_ord){
         Order::where('id',$id_ord)->delete();
   }

     public static function confirm($id_ord){
         Order::where('id',$id_ord)->update(['order_state'=>'requested']);
   }

}
