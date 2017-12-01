<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'id_category', 'product','price','price_kg','barcode','images','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public static function extractProds(){

       $prods = Product::where([
        ['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/ico-drive-plus.png'],
        ['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/foto_non_disponibile.jpg'],
        ['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/default/images/icons/promo.png'],
        ['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/label-non-disponibile.png']]
       )->inRandomOrder()->limit(36)->get();
        return $prods;
    }


    public static function search($text){
       $key_words = explode(' ', $text);
       if(!count($key_words)<=0){
        $arrayName=[];
        for ($i=0; $i < count($key_words) ; $i++) { 
            $arrayName[]=['product','like','%'.$key_words[$i].'%'];
        }
            $arrayName[]=['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/ico-drive-plus.png'];
        $arrayName[]=['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/foto_non_disponibile.jpg'];
        $arrayName[]=['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/default/images/icons/promo.png'];
        $arrayName[]=['images','!=','http://www.spesasimply.it/skin/frontend/chronodrive/simply/images/label-non-disponibile.png'];
            $prods = Product::where($arrayName)->limit(36)->get();
       }else{
        $prods=[];
       }
       
        return $prods;
    }
}
